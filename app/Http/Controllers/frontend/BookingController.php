<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Fleet;
use App\Models\FleetTax;

class BookingController extends Controller
{
    public function index()
    {
        try {
            $fleets = Fleet::all();
            return view('frontend.booking.index', compact('fleets'));
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
        dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'fleet_id' => 'required',
            'pickup_location' => 'required',
            'dropoff_location' => 'required',
            'booking_date' => 'required',
        ]);
        try {
            $booking = new Booking();
            $booking->name = $request->name;
            $booking->email = $request->email;
            $booking->phone_number = $request->phone_number;
            $booking->fleet_id = $request->fleet_id;
            $booking->pickup_location = $request->pickup_location;
            $booking->dropoff_location = $request->dropoff_location;
            $booking->booking_date = $request->booking_date;
            $booking->other_name = $request->other_name;
            $booking->other_email = $request->other_email;
            $booking->other_phone_number = $request->other_phone_number;
            $booking->save();
            return redirect()->route('frontend.index')->with('success', 'Booking successful');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while booking');
        }

    }
}
