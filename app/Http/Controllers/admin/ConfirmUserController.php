<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;
use Exception;
use App\Http\Requests\AddCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Booking;
use App\Models\FleetTax;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Status;

class ConfirmUserController extends Controller
{    
    public function index(Request $request)
    {
        try {
            $draftUsers  = Booking::where('is_payment', 1);
            $drivers = User::where('role', 'driver')->get();
            $statuses = Status::all();

            if (isset($request->date) && !empty($request->date)) {
                $draftUsers = $draftUsers->where('booking_date', $request->date);
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
                $draftUsers = $draftUsers->orderBy('id', $request->sort);
            } else {
                $draftUsers = $draftUsers->orderBy('id', 'desc');
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
            $Booking = Booking::find($id);
            
            if (!$Booking) {
                return redirect()->back()->with('error', 'Booking not found');
            }
            $assigned_to = intval($request->input('assigned_to'));
            if($Booking->assigned_to != $assigned_to){
                $Booking->assigned_to = $assigned_to;
                $Booking->save();
                return redirect()->back()->with('success', 'Booking assigned successfully');
            }
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}