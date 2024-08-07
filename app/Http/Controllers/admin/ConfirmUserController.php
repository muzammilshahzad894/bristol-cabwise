<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Http\Requests\AddCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Services\EmailService;
use App\Models\Booking;
use App\Models\FleetTax;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Status;

class ConfirmUserController extends Controller
{    
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function index(Request $request)
    {
        try {
            $draftUsers  = Booking::where('is_payment', 1);
            $drivers = User::where('role', 'driver')->get();
            $statuses = Status::all();

            if (isset($request->from_date) && !empty($request->from_date)) {
                $draftUsers = $draftUsers->where('booking_date', '>=', $request->from_date);
            }

            if (isset($request->to_date) && !empty($request->to_date)) {
                $draftUsers = $draftUsers->where('booking_date', '<=', $request->to_date);
            }

            if (isset($request->from_time) && !empty($request->from_time)) {
                $draftUsers = $draftUsers->where('booking_time', '>=', $request->from_time);
            }

            if (isset($request->to_time) && !empty($request->to_time)) {
                $draftUsers = $draftUsers->where('booking_time', '<=', $request->to_time);
            }

            if (isset($request->status) && !empty($request->status)) {
                $draftUsers = $draftUsers->where('status_id', $request->status);
            }

            if (isset($request->sort) && !empty($request->sort)) {
                $draftUsers = $draftUsers->orderBy('booking_date', $request->sort)->orderBy('booking_time', $request->sort);
            } else {
                $draftUsers = $draftUsers->orderBy('booking_date', 'asc')->orderBy('booking_time', 'asc');
            }

            $draftUsers = $draftUsers->paginate(10);

            return view('admin.users.index', compact('draftUsers', 'drivers', 'statuses'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
 
    public function delete($id)
    {
        try {
            Booking::find($id)->delete();
            return redirect()->route('admin.coupons.index')->with('success', 'block date deleted successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function update(Request $request, $id)
    {
        try {
            // Find the booking by ID
            $Booking = Booking::find($id);
            
            // Check if the booking exists
            if (!$Booking) {
                return redirect()->back()->with('error', 'Booking not found');
            }
            
            $status = intval($request->input('status'));
           if($Booking->status != $status){
            $Booking->status = $status;
            $Booking->save();
            return redirect()->back()->with('success', 'Booking status updated successfully');
            }
            
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function assign(Request $request, $id)
    {
        try {
            $booking = Booking::find($id);
            
            if (!$booking) {
                return redirect()->back()->with('error', 'Booking not found');
            }
            $assigned_to = intval($request->input('assigned_to'));
            if($booking->assigned_to != $assigned_to){
                $booking->assigned_to = $assigned_to;
                $booking->save();

                // send email to the driver
                $driver = User::find($assigned_to);
                if($booking->return_id){
                    $returnBooking = Booking::find($booking->return_id);
                }
                $bookingDetails = (object) [
                    'serviceType' => $booking->service->name,
                    'pickupLocation' => $booking->pickup_location,
                    'via_locations' => $booking->via_locations ? json_decode($booking->via_locations) : [],
                    'dropoffLocation' => $booking->dropoff_location,
                    'dateAndTime' => formatDate($booking->booking_date) . ' ' . foramtTime($booking->booking_time),
                    'is_return' => $booking->return_id ? true : false,
                    'return_dateAndTime' => $booking->return_id ? formatDate($returnBooking->booking_date) . ' ' . foramtTime($returnBooking->booking_time) : null,
                    'name' => $booking->name,
                    'telephone' => $booking->phone_number,
                    'email' => $booking->email,
                    'no_of_passenger' => $booking->no_of_passenger,
                    'is_childseat' => $booking->is_childseat ? $booking->is_childseat : '-',
                    'is_meet_greet' => $booking->is_meet_greet ? 'Yes' : '-',
                    'no_suit_case' => $booking->no_suit_case,
                    'no_of_laugage' => $booking->no_of_laugage,
                    'summary' => $booking->summary ? $booking->summary : '-',
                    'other_name' => $booking->other_name ? $booking->other_name : '-',
                    'other_phone_number' => $booking->other_phone_number ? $booking->other_phone_number : '-',
                    'other_email' => $booking->other_email ? $booking->other_email : '-',
                    'is_extra_lauggage' => $booking->is_extra_lauggage ? 'Yes' : '-',
                ];

                $this->emailService->sendDriverAssign($driver, $bookingDetails);

                return redirect()->back()->with('success', 'Booking assigned successfully');
            }
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function edit($id)
    {
        try {
            $booking = Booking::find($id);
            // dd($booking);
            return view('admin.users.edit', compact('booking'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function bookingupdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'other_name' => 'nullable|string|max:255',
            'other_email' => 'nullable|email|max:255',
            'other_phone_number' => 'nullable|string|max:20',
            'booking_date' => 'required|date',
            'booking_time' => 'required|date_format:H:i',
            'no_of_passenger' => 'nullable|integer|min:1',
            'no_suit_case' => 'nullable|integer|min:0',
            'summary' => 'nullable|string',
            'no_of_laugage' => 'nullable|integer|min:0',
            'flight_time' => 'nullable|date_format:H:i',
            'flight_name' => 'nullable|string|max:255',
            'flight_type' => 'nullable|string|max:255',
            'total_price' => 'nullable|numeric|min:0',
            'is_extra_lauggage' => 'nullable|boolean',
            'is_childseat' => 'nullable|boolean',
            'is_meet_nd_greet' => 'nullable|boolean',
        ]);
    $booking = Booking::findOrFail($id);
     $booking->name = $request->name;
     $booking->email = $request->email;
     $booking->phone_number = $request->phone_number;
     $booking->other_name = $request->other_name;
     $booking->other_email = $request->other_email;
     $booking->other_phone_number = $request->other_phone_number;
     $booking->booking_date = $request->booking_date;
     $booking->booking_time = $request->booking_time;
     $booking->no_of_passenger = $request->no_of_passenger;
     $booking->no_suit_case = $request->no_suit_case;
     $booking->summary = $request->summary;
     $booking->no_of_laugage = $request->no_of_laugage;
     $booking->flight_time = $request->flight_time ?? "";
     $booking->flight_name = $request->flight_name ?? "";
     $booking->flight_type = $request->flight_type ?? "";
     $booking->total_price = $request->total_price;
     $booking->is_extra_lauggage = $request->is_extra_lauggage ? 1:0;
     $booking->is_childseat = $request->is_childseat ? 1 : 0;
     $booking->is_meet_nd_greet = $request->is_meet_nd_greet ? 1: 0;
     if($request->is_payment == 1){
         $booking->is_draft = 0;
         $booking->is_payment = 1;
     }
 
     $booking->save();
 


        return redirect()->route('admin.confirm.index', $booking->id)->with('success', 'Booking updated successfully.');
    }
}