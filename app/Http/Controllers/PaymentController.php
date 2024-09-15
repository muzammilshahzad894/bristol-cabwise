<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use App\Models\Booking;
use App\Models\UsedCoupon;
use App\Models\Coupon;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function createCheckoutSession($id, Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $booking = Booking::find($id);
        $price = null;
        if($booking->return_id){
            $returnBooking = Booking::find($booking->return_id);
            $price = $booking->total_price + $returnBooking->total_price;
        }else{

        $price = $booking->total_price;
        }
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => 'Booking Car',
                    ],
                    'unit_amount' => $price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['id' => $id]),
            'cancel_url' => route('payment.cancel', ['id' => $id]),
        ]);

        return response()->json(['id' => $session->id]);
    }
    
    public function showStripePaymentPage($id)
    {
        return view('create-checkout-session', ['bookingId' => $id]);
    }

    public function paymentSuccess($id)
    {
        $booking = Booking::find($id);
        if($booking->return_id){
            $returnBooking = Booking::find($booking->return_id);
            $returnBooking->is_payment = 1;
            $returnBooking->is_draft = 0;
            $returnBooking->save();
        }
        if ($booking) {
            $booking->is_payment = 1;
            $booking->is_draft = 0;
            $booking->save();
            $bookingName =$booking->pickup_location;
            $user = User::find($booking->user_id);
            $couponDiscount = UsedCoupon::where('user_id', $user->id)->first();
            $coupon = null;
            if($couponDiscount){
                $coupon = Coupon::where('id', $couponDiscount->coupon_id)->first(); 
            }
            $bookingDetails = (object) [
                'bookingId' => $booking->id,
                'serviceType' => $booking->service->name,
                'pickupLocation' => $booking->pickup_location,
                'via_locations' => $booking->via_locations ? json_decode($booking->via_locations) : [],
                'dropoffLocation' => $booking->dropoff_location,
                'dateAndTime' => formatDate($booking->booking_date) . ' ' . foramtTime($booking->booking_time),
                'is_return' => $booking->return_id ? true : false,
                'return_dateAndTime' => $booking->return_id ? formatDate($returnBooking->booking_date) . ' ' . foramtTime($returnBooking->booking_time) : null,
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

            $this->emailService->sendBookingConfirmation($user, $bookingDetails);
            
            Log::info('Payment successful, redirecting to booking success page.');
            return redirect()->route('booking.success')->with('success', 'Payment successful.');
        } else {
            // If the booking does not exist, redirect back with an error message
            return redirect()->back()->with('error', 'Booking not found.');
        }
    }
    

    public function paymentCancel()
    {
        return view('frontend.booking.cancel');
    }
    public function generatePayPalLink($bookingId)
{
    $paypalLink = "https://www.paypal.com/checkoutnow?token=" . $bookingId;
    
    return response()->json(['paypal_link' => $paypalLink]);
}
public function prepareForRegistration(Request $request)
    {
        // $request->session()->flush();
        $request->session()->put('ispayment', true);
        return response()->json(['success' => true]);
    }
    
}
