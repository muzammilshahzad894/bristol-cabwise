<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Services\EmailService;
use App\Models\Refund;
use App\Models\Booking;
use App\Models\User;
use App\Models\UsedCoupon;
use App\Models\Coupon;
use App\Http\Requests\UpdateRefundRequest;

class RefundController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function index()
    {
        try {
            $refunds = Refund::paginate(10);
            return view('admin.refunds.index', compact('refunds'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(UpdateRefundRequest $request, $id)
    {
        try {
            $data = $request->only(['status', 'amount', 'admin_message']);

            $refund = Refund::find($id);
            $allRefundRequests = Refund::where('booking_id', $refund->booking_id)->get();
            foreach ($allRefundRequests as $refundRequest) {
                $refundRequest->update($data);
            }

            $booking = Booking::find($refund->booking_id);
            $user = User::find($booking->user_id);
            $couponDiscount = UsedCoupon::where('user_id', $user->id)->first();
            $coupon = null;
            if($couponDiscount){
                $coupon = Coupon::where('id', $couponDiscount->coupon_id)->first(); 
            }
            
            // pending = 0, approved = 1, rejected = 2, refunded = 3
            $emailData = [
                'bookingId' => $booking->id,
                'admin_message' => $data['admin_message'],
                'user_email' => $refund->user_email,
                'user_name' => $refund->user_name,
                'serviceType' => $booking->service->name,
                'pickupLocation' => $booking->pickup_location,
                'dropoffLocation' => $booking->dropoff_location,
                'dateAndTime' => formatDate($booking->booking_date) . ' ' . foramtTime($booking->booking_time),
                'name' => $booking->name,
                'telephone' => $booking->phone_number,
                'email' => $booking->email,
                'no_of_passenger' => $booking->no_of_passenger,
                'is_childseat' => $booking->is_childseat ? $booking->is_childseat : '-',
                'is_meet_greet' => $booking->is_meet_greet ? 'Yes' : '-',
                'no_suit_case' => $booking->no_suit_case,
                'no_of_laugage' => $booking->no_of_laugage,
                'summary' => $booking->summary ? $booking->summary : '-',
                'other_name' => $booking->other_name ? $booking->other_name : '-',
                'other_phone_number' => $booking->other_phone_number ? $booking->other_phone_number : '-',
                'other_email' => $booking->other_email ? $booking->other_email : '-',
                'fleet_price' => $booking->total_price,
                'is_extra_lauggage' => $booking->is_extra_lauggage ? 'Yes' : '-',
                'coupon_discount' => $coupon ? $coupon->discount : 0,
            ];
            if($data['status'] == 3) {
                $emailData['amount'] = $data['amount'];
            }

            $this->emailService->sendRefundStatusEmail($emailData);

            return response()->json([
                'status' => 'success',
                'message' => 'Refund request updated successfully'
            ]);
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong, please try again later'
            ]);
        }
    }
}