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
use Illuminate\Support\Facades\Artisan;

class CarsController extends Controller
{
    public function redirection()
    {
        // Artisan::call('optimize:clear');
        $session = session()->all();
        // dd($session);
        $ispayment = $session['ispayment'] ?? null;
        if ($ispayment) {
            $clientIp = getHostByName(getHostName());
            $booking = Booking::where('user_ip', $clientIp)
            ->where('is_draft', 1)
            ->orderBy('id', 'desc')
            ->first();
                             
            if ($booking) {
                $booking->user_id = auth()->user()->id;
                $booking->save();
                session()->forget('ispayment');
                // $via_locations = json_decode($booking->via_locations, true);
                // if (!empty($via_locations)) {   
                //     return redirect()->back()->with('error', 'Please select a valid location');
                // }
                
                return redirect('/client-booking-payment?payment_id=' . $booking->id);
            }
        }

        return null; // Return null if no redirection
    }
    public function index()
    {
        try {
            
            $redirectionResponse = $this->redirection();
            if ($redirectionResponse) {
                return $redirectionResponse;
            };
        
            $services = Service::all();
            $coupon = Coupon::where('public', 'public')->latest()->first();
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
