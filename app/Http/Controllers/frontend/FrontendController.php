<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Refund;
use App\Models\Review;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function about()
    {
        return view('frontend.about');
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
    public function refund(){
        
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
    
            if ($check) {
                return redirect()->back()->with('error', 'You already sent the refund request for this booking');
            }
    
            $refund = new Refund();
            $refund->user_id = $user_id;
            $refund->booking_id = $booking_id;
            $refund->user_name = $request->user_name;
            $refund->user_email = $request->email;
            $refund->card_number = $request->account_number;
            $refund->bank_name = $request->bank_name;
            $refund->reason = $request->reason;
            $refund->save();
    
            return redirect()->back()->with('success', 'Refund request sent successfully');
        } catch (\Exception $e) {
            // Log the exception
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
