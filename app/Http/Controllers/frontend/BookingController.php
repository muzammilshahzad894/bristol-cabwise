<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Fleet;
use App\Models\FleetTax;
use App\Models\Booking;
use App\Models\BlockDate;

class BookingController extends Controller
{
    public function index()
    {
        try {
            
            $fleets = Fleet::all();
            $user_id = auth()->user()->id;
            
            $role = auth()->user()->role;
            $blockDates = BlockDate::all()->pluck('date_range')->toArray();
            if($role == 'user')
            {
                $booking_detail = Booking::where('user_id', $user_id)->where('is_draft', 1)->first();
                
            }
            else{
                $booking_detail = null;
            }
            
            return view('frontend.booking.index', compact('fleets', 'booking_detail', 'blockDates'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching bookings');
        }
    }
    public function fleetDetails($id)
    {
        try {
            $fleet = Fleet::find($id);
            $fleetTax = FleetTax::where('fleet_id', $id)->get();
            return response()->json(['fleet' => $fleet, 'fleetTax' => $fleetTax]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching fleet details');
        }
    }
    public function store(Request $request)
    {
        try {
            $user_id = auth()->user()->id;
            $role = auth()->user()->role;
            if($role == 'user')
            {
                $bookingDate = strtotime($request->date);
                $blockedDates = BlockDate::all(); 
                foreach ($blockedDates as $blockedDate) {
                    $blockedUnixDate = strtotime($blockedDate->date_range);
                    
                    if ($bookingDate == $blockedUnixDate) {
                        return response()->json(['error' => 'Booking date is blocked'], 400); 
                    }
                }
                $booking_detail = Booking::where('user_id', $user_id)->where('is_draft', 1)->first();
                if($booking_detail){
                    $booking_detail->delete();
                }
            }
            if($role == "admin"){
                $booking_detail = Booking::where('user_id', $user_id)->where('is_draft', 1)->where('other_email', $request->other_email)->first();
                if($booking_detail){
                    $booking_detail->delete();
                }
            }


            $booking = new Booking();
            $booking->name = $request->name;
            $booking->email = $request->email;
            $booking->phone_number = $request->phone_number;
            $booking->fleet_id = $request->fleet_id;
            $booking->pickup_location = $request->pickup_location;
            $booking->dropoff_location = $request->dropoff_location;
            $booking->booking_date = $request->date;
            $booking->booking_time = $request->time;
            $booking->other_name = $request->other_name;
            $booking->other_email = $request->other_email;
            $booking->other_phone_number = $request->other_phone_number;
            $booking->is_childseat = $request->child_seat;
            $booking->is_meet_nd_greet = $request->meet_greet;
            $booking->summary = $request->summary;
            $booking->no_of_passenger = $request->no_of_passenger;
            $booking->no_suit_case = $request->no_suite_case;
            $booking->no_of_laugage = $request->no_hand_luggage;
            $booking->flight_name = $request->flight_name;
            $booking->flight_time = $request->flight_time;
            $booking->user_id = $user_id;
            $booking->flight_name = $request->flight_name;
            $booking->flight_time = $request->flight_time;
            $booking->flight_type = $request->flight_type;
            $booking->total_price = $request->total_price;
            $booking->service_id = $request->service_id;
            $booking->payment_method = $request->payment_method;
            $booking->save();
            $bookingId = $booking->id;
            return response()->json(['booking_id' => $bookingId]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred while booking'], 500); // HTTP status code 500 for server errors
        }
    }
    
    public function bookingSuccess()
    {
        return view('frontend.booking.success');
    }
    public function clientBookingPayment()
    {
        
        return view('frontend.booking.client-booking');
    }
    public function allFleets()
    {
        $fleets = Fleet::all();
        foreach ($fleets as $fleet) {
            $fleet->taxes = FleetTax::where('fleet_id', $fleet->id)->get();
        }
        return response()->json(['fleets' => $fleets]);
    }
    
    public function fleettaxDetails($id)
    {
        $fleet = Fleet::find($id);
        $fleetTax = FleetTax::where('fleet_id', $id)->get();
        return response()->json([ 'fleetTax' => $fleetTax]);
    }
}
