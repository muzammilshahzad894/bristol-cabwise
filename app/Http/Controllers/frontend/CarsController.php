<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Car;
use App\Models\Coupon;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Fleet;

class CarsController extends Controller
{
    private function redirection(){
        
        $session = session()->all();
        $ispayment = $session['ispayment'] ?? null;
        if ($ispayment) {
            $clientIp =  getHostByName(getHostName());
            $booking = Booking::where('user_ip', $clientIp)
                              ->where('is_draft', 1)
                              ->first();
                              
            $baseUrl = url('/');
            $redirectionUrl = $baseUrl . '/client-booking-payment?payment_id=' . $booking->id;
            if ($booking) {
            session()->forget('ispayment');
            return redirect($redirectionUrl);
            //update the previous url to the new url
            }
        }
    }
    public function index()
    {
        try {
            // $session = session()->all();
            // dd($session);
            // $ispayment = $session['ispayment'] ?? null; // This will get the value of ispayment or null if it's not set
            // dd($ispayment);
            $services = Service::all();
            //get the coupon column public value public
            $coupon = Coupon::where('public', 'public')->latest()->first();
            // $coupon = Coupon::latest()->first();
            $fleets = Fleet::all();
            return view('frontend.index', compact('services', 'fleets', 'coupon'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching cars');
        }
    }
    public function carDetails($id)
    {
        try {
            $service = Service::find($id);
            $services = Service::all();
            return view('frontend.carDetail.index', compact('service', 'services'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching car details');
        }
    }
}
