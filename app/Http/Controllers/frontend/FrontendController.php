<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Refund;
use App\Models\Review;
use App\Models\User;
use App\Models\Fleet;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\HelperController;
use App\Services\EmailService;
use Carbon\Carbon;


class FrontendController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function about()
    {
        
        $services = Service::all();
        return view('frontend.about', compact('services'));
 
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function services()
    {
        $services = Service::all();
        return view('frontend.services', compact('services'));
    }
    public function fleetDetailsFrontend($id)
    {
        $fleet = Fleet::find($id);
        return view('frontend.fleetDetails', compact('fleet'));
    }
    public function faqs()
    {
        try {
            return view('frontend.faqs');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching faqs');
        }
    }

    public function termCondition()
    {
        try {
            return view('frontend.termCondition');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching term and condition');
        }
    }
    public function trustVoilet()
    {
        try {
            return view('frontend.truestVoilet');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching car details');
        }
    }
    public function login()
    {
        try {
            return view('frontend.login.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching car details');
        }
    }
    public function signup()
    {
        try {
            return view('frontend.login.signup');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching car details');
        }
    }

    public function userHistory()
    {
        try {
            
            $user_id = auth()->user()->id;
            $role = auth()->user()->role;
            if($role == 'user')
            {
                $booking_detail = Booking::where('user_id', $user_id)->where('is_draft', 0)->get();
            }
            else{
                $booking_detail = null;
            }
            return view('frontend.userHistory.index', compact('booking_detail'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching bookings');
        }
    }
    public function refund()
    {    
        $user_id = auth()->user()->id;
        $role = auth()->user()->role;

        $pending_bookings = Booking::where('user_id', $user_id)->where('status', 0)->get();

        return view('frontend.refund.index', compact('pending_bookings'));
    }
    public function refundRequest(Request $request)
    {
        try {
            $user_id = auth()->user()->id;
            $booking_id = $request->booking_id;
            $check = Refund::where('user_id', $user_id)->where('booking_id', $booking_id)->first();
            // if ($check) {
            //     return redirect()->back()->with('error', 'You already sent the refund request for this booking');
            // }
            $refund = new Refund();
            $refund->user_id = $user_id;
            $refund->booking_id = $booking_id;
            $refund->user_name = $request->user_name;
            $refund->user_email = $request->email;
            $refund->card_number = $request->account_number;
            $refund->bank_name = $request->bank_name;
            $refund->reason = $request->reason;
            $refund->save();
       
            $user = User::find($user_id);
            $booking = Booking::find($booking_id);
            $refund_amount = $booking->total_price;
            
            $bookingDetails = (object) [
                'userName' => $user->name,
                'bookingId' => $booking->id,
                'email' => $request->email,
                'accountNumber' => $request->account_number,
                'bankName' => $request->bank_name,
                'refundAmount' => $refund_amount,
                'reason' => $request->reason,
            ];

            $this->emailService->sendRefundRequest($user, $bookingDetails);
            
            return redirect()->back()->with('success', 'Refund request sent successfully');
        } catch (\Exception $e) {
            Log::error('Refund Request Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while processing your request');
        }
    }
    


    public function reviewget()
    {
        return view('frontend.review.index');
    }
    public function reviewPost(Request $request)
    {

        try {
            $review = new Review();
            $review->user_id = auth()->user()->id;
            $review->stars = $request->rating;
            $review->comment = $request->review;
            $review->save();
            return redirect()->route('frontend.index')->with('success', 'Review posted successfully');
        } catch (\Exception $e) {
            Log::error('Review Post Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while processing your request');
        }
    }
}
