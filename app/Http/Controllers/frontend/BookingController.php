<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Fleet;

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
            return response()->json($fleet);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching fleet details');
        }
    }
}
