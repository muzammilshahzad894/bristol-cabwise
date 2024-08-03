<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Quotation;
use App\Models\Refund;
use App\Models\Review;
use App\Models\User;
use App\Models\Fleet;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\HelperController;
use App\Services\EmailService;
use App\Http\Controllers\frontend\CarsController;
use Carbon\Carbon;
use League\CommonMark\Extension\SmartPunct\Quote;

class FrontendController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function about()
    {
         
        $redirection = new CarsController();
        $redirectionResponse = $redirection->redirection();
        if ($redirectionResponse) {
            return $redirectionResponse;
        }
    
        $services = Service::all();
        return view('frontend.about', compact('services'));
 
    }

    public function contact()
    {
        
        $redirection = new CarsController();
        $redirectionResponse = $redirection->redirection();
        if ($redirectionResponse) {
            return $redirectionResponse;
        };
        return view('frontend.contact');
    }

    public function services()
    {
        
        $redirection = new CarsController();
        $redirectionResponse = $redirection->redirection();
        if ($redirectionResponse) {
            return $redirectionResponse;
        };
        $services = Service::all();
        return view('frontend.services', compact('services'));
    }
    public function fleetDetailsFrontend($id)
    {
        $redirection = new CarsController();
        $redirectionResponse = $redirection->redirection();
        if ($redirectionResponse) {
            return $redirectionResponse;
        };
        $fleet = Fleet::find($id);
        return view('frontend.fleetDetails', compact('fleet'));
    }
    public function faqs()
    {
        try {
            
            $redirection = new CarsController();
            $redirectionResponse = $redirection->redirection();
            if ($redirectionResponse) {
                return $redirectionResponse;
            };
            return view('frontend.faqs');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching faqs');
        }
    }

    public function termCondition()
    {
        try {
            
            $redirection = new CarsController();
            $redirectionResponse = $redirection->redirection();
            if ($redirectionResponse) {
                return $redirectionResponse;
            };
            return view('frontend.termCondition');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching term and condition');
        }
    }
    public function trustVoilet()
    {
        try {
            
            $redirection = new CarsController();
            $redirectionResponse = $redirection->redirection();
            if ($redirectionResponse) {
                return $redirectionResponse;
            };
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
            $refund->sort_code = $request->sort_code;
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
                'sortCode' => $request->sort_code,
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
    public function getquote(){
        try {
            
        $session = session()->all();
        $ispayment = $session['ispayment'] ?? null;
        if($ispayment){
            $redirection = new CarsController();
            $redirection->redirection();
        };
            $fleets = Fleet::all();
            return view('frontend.getquote.index', compact('fleets'));
        } catch (\Exception $e) {
            Log::error('Review Post Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while processing your request');
        
        }

    }
    public function getquotePost(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'pickup' => 'required',
                'dropoff' => 'required',
                'date' => 'required|date',
                'fleet_id' => 'required',
                'fullname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'pickup_postal_code' => 'required',
                'dropoff_postal_code' => 'required',
                'pickup_city' => 'required',
                'dropoff_city' => 'required',
                
            ]);
    
            
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
            $pickup_date = Carbon::parse($request->date)->format('Y-m-d');
            $pickup_time = Carbon::parse($request->date)->format('H:i:s');
            $pickup = $pickup_date . ' ' . $pickup_time;
            $booking = new Quotation();
            $booking->pickup = $request->pickup;
            $booking->dropoff = $request->dropoff;
            $booking->date_time = $pickup;
            $booking->fleet_id = intval($request->fleet_id);
            $booking->fullname = $request->fullname;
            $booking->email = $request->email;
            $booking->phone = $request->phone;
            $booking->pickup_postal_code = $request->pickup_postal_code;
            $booking->dropoff_postal_code = $request->dropoff_postal_code;
            $booking->pickup_city = $request->pickup_city;
            $booking->dropoff_city = $request->dropoff_city;
            $booking->return_journey = intval($request->return_journey);
            $booking->comment = $request->comment;
            $booking->created_at = Carbon::now();
            $booking->updated_at = Carbon::now();
            $booking->save();
            return redirect()->back()->with('success', 'Quote sent successfully');
        } catch (\Exception $e) {
            Log::error('Quote Post Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while processing your request');
        }
    }
    
}
