<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Fleet;
use App\Models\FleetTax;
use App\Models\Booking;
use App\Models\BlockDate;
use App\Models\Setting;

class BookingController extends Controller
{
    public function getSelectServiceTax(Request $request){
        $servieId = $request->service_id;
        dd($servieId);
        $serviceTaxes = FleetTax::where('service_id', $request->service_id)->get();
        dd($serviceTaxes);
        return response()->json($serviceTaxes);
    }
    public function index()
    {
        try {    
            $user_id = null;
            if(!auth()->user()){
                $user_ip  = getHostByName(getHostName());
                $role = 'user';
            }else{
                $user_id = auth()->user()->id;
                $role = auth()->user()->role;
            }
            // $user_id = auth()->user()->id;
            $fleets = Fleet::all();
            if($role == 'user')
            {
                $blockDates = BlockDate::all();
                if($user_id != null){
                    $booking_detail = Booking::where('user_id', $user_id)->where('is_draft', 1)->orderBy('id', 'desc')->first();
                }
                else{
                    $booking_detail = Booking::where('user_ip', $user_ip)->where('is_draft', 1)->orderBy('id', 'desc')->first();
                    
                }
                $bookingHour = Setting::where('key', 'min_booking_hours')->first();
                if($bookingHour){
                    $bookingHours = $bookingHour->value;
                }
                else{
                    $bookingHours = null;
                }
            }
            else{
                $bookingHours = null;
                $booking_detail = null;
                $blockDates = null;
            }
            
            return view('frontend.booking.index', compact('fleets', 'booking_detail', 'blockDates', 'bookingHours'));
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
    public function getServiceTax(Request $request)
    {
        $serviceId = $request->query('service_id');
        
        if (!$serviceId) {
            return response()->json(['error' => 'Service ID is required'], 400);
        }
    
        $serviceTaxes = FleetTax::where('service_id', $serviceId)->get();
    
        if ($serviceTaxes->isEmpty()) {
            return response()->json(['error' => 'Service taxes not found'], 404);
        }
    
        $totalTax = $serviceTaxes->sum('price');
    
        return response()->json(['total_tax' => $totalTax, 'taxes' => $serviceTaxes], 200);
    }


    public function store(Request $request)
    {
        try {
            $user_id = null;
            $user_ip = null;
            $role = null;
            if(!auth()->user()){
                $user_ip  = getHostByName(getHostName());
                $role = 'user';
            }else{
                $user_id = auth()->user()->id;
                $role = auth()->user()->role;
            }
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
                if($user_id != null){
                    $booking_detail = Booking::where('user_id', $user_id)->where('is_draft', 1)->orderBy('id', 'desc')->first();
                  
                }
                else{
                    $booking_detail = Booking::where('user_ip', $user_ip)->where('is_draft', 1)->orderBy('id', 'desc')->first();
                }
                if ($booking_detail && $booking_detail->return_id != null) {
                    
                    $booking_id = intval($booking_detail->return_id);
                    $next_booking = Booking::where('id', $booking_id)->first();
    
                    if ($next_booking) {
                        $next_booking->delete();
                    }
    
                    $booking_detail->delete();
                } elseif ($booking_detail) {
                    $booking_detail->delete();
                }
            }
            if($role == "admin"){
                $booking_detail = Booking::where('user_id', $user_id)->where('is_draft', 1)->where('other_email', $request->other_email)->first();
                if($booking_detail){
                    $booking_detail->delete();
                }
            }
            $total_price = null;
            if($request->return == 1) {
                $total_price = $request->total_price/2;
            }
            else{
                $total_price = $request->total_price;
            }
            
            $bookingId= null;


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
            $booking->user_id = $user_id ?? '0';
            $booking->user_ip = $user_ip ?? '0';
            $booking->flight_name = $request->flight_name;
            $booking->flight_time = $request->flight_time;
            $booking->flight_type = $request->flight_type;
            $booking->total_price = $total_price;
            $booking->service_id = $request->service_id;
            $booking->payment_method = $request->payment_method;
            $booking->is_extra_lauggage = $request->extra_lauggage;
            $booking->via_locations = json_encode($request->via_locations);
            $booking->save();

            $bookingId = $booking->id;
        if ($request->return == 1) {
            $bookingIds =  $this->createReturnBooking($request, $user_id, $user_ip, $bookingId, $total_price);
            $bookingId = $bookingIds;
        }
            return response()->json(['booking_id' => $bookingId]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred while booking'], 500); // HTTP status code 500 for server errors
        }
    }
    public function createReturnBooking($request, $user_id, $user_ip, $bookingId, $total_price)
    {
        $returnBooking = new Booking();
        $returnBooking->name = $request->name;
        $returnBooking->email = $request->email;
        $returnBooking->phone_number = $request->phone_number;
        $returnBooking->fleet_id = $request->fleet_id;
        $returnBooking->pickup_location = $request->dropoff_location;
        $returnBooking->dropoff_location = $request->pickup_location;
        $returnBooking->booking_date = $request->return_date;
        $returnBooking->booking_time = $request->return_time;
        $returnBooking->other_name = $request->other_name;
        $returnBooking->other_email = $request->other_email;
        $returnBooking->other_phone_number = $request->other_phone_number;
        $returnBooking->is_childseat = $request->child_seat;
        $returnBooking->is_meet_nd_greet = $request->meet_greet;
        $returnBooking->summary = $request->summary;
        $returnBooking->no_of_passenger = $request->no_of_passenger;
        $returnBooking->no_suit_case = $request->no_suite_case;
        $returnBooking->no_of_laugage = $request->no_hand_luggage;
        $returnBooking->flight_name = $request->flight_name;
        $returnBooking->flight_time = $request->flight_time;
        $returnBooking->user_id = $user_id ?? '0';
        $returnBooking->user_ip = $user_ip ?? '0';
        $returnBooking->flight_name = $request->flight_name;
        $returnBooking->flight_time = $request->flight_time;
        $returnBooking->flight_type = $request->flight_type;
        $returnBooking->total_price = $total_price;
        $returnBooking->service_id = $request->service_id;
        $returnBooking->payment_method = $request->payment_method;
        $returnBooking->is_extra_lauggage = $request->extra_lauggage;
        $returnBooking->via_locations =json_encode($request->via_locations);
        $returnBooking->return_id = $bookingId;
        $returnBooking->save();
    
        return $returnBooking->id;
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
        $fleets = Fleet::orderBy('id', 'asc')->get();
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
