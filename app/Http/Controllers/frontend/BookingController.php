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
            $booking_detail = Booking::where('user_id', 1)->first();
            return view('frontend.booking.index', compact('fleets', 'booking_detail'));
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
            $bookingDate = strtotime($request->date); // Convert booking date to a Unix timestamp

            $blockedDates = BlockDate::all(); // Fetch all blocked dates from the database
            
            foreach ($blockedDates as $blockedDate) {
                $blockedUnixDate = strtotime($blockedDate->date_range);
                
                if ($bookingDate == $blockedUnixDate) {
                    return response()->json(['error' => 'Booking date is blocked'], 400); 
                }
            }
            $booking_detail = Booking::where('user_id', 1)->first();
            if($booking_detail){
                $booking_detail->delete();
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
            $booking->user_id = 1;
            $booking->flight_name = $request->flight_name;
            $booking->flight_time = $request->flight_time;
            $booking->flight_type = $request->flight_type;
            $booking->save();
    
            return response()->json(['success' => 'Booking successful'], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred while booking'], 500); // HTTP status code 500 for server errors
        }
    }
    
    public function bookingSuccess()
    {
        return view('frontend.booking.success');
    }
}
