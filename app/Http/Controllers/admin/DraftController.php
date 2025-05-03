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
use App\Models\Coupon;
use App\Models\User;
use App\Models\Status;

class DraftController extends Controller
{
    public function index(Request $request)
    {
        try {
            $draftUsers  = Booking::where('is_draft', 1);

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

            if (isset($request->sort) && !empty($request->sort)) {
                $draftUsers = $draftUsers->orderBy('booking_date', $request->sort)->orderBy('booking_time', $request->sort);
            } else {
                $draftUsers = $draftUsers->orderBy('booking_date', 'asc')->orderBy('booking_time', 'asc');
            }

            $draftUsers = $draftUsers->paginate(10);

            return view('admin.draft.index', compact('draftUsers'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function bookByAdmin(Request $request){
        try {
            $bookByAdmin  = Booking::where('is_draft', 1)->where('user_id', 1);
            $drivers = User::where('role', 'driver')->get();
            $statuses = Status::all();

            if (isset($request->from_date) && !empty($request->from_date)) {
                $bookByAdmin = $bookByAdmin->where('booking_date', '>=', $request->from_date);
            }

            if (isset($request->to_date) && !empty($request->to_date)) {
                $bookByAdmin = $bookByAdmin->where('booking_date', '<=', $request->to_date);
            }

            if (isset($request->from_time) && !empty($request->from_time)) {
                $bookByAdmin = $bookByAdmin->where('booking_time', '>=', $request->from_time);
            }

            if (isset($request->to_time) && !empty($request->to_time)) {
                $bookByAdmin = $bookByAdmin->where('booking_time', '<=', $request->to_time);
            }

            if (isset($request->status) && !empty($request->status)) {
                $bookByAdmin = $bookByAdmin->where('status_id', $request->status);
            }

            if (isset($request->sort) && !empty($request->sort)) {
                $bookByAdmin = $bookByAdmin->orderBy('booking_date', $request->sort)->orderBy('booking_time', $request->sort);
            } else {
                $bookByAdmin = $bookByAdmin->orderBy('booking_date', 'asc')->orderBy('booking_time', 'asc');
            }

            $bookByAdmin = $bookByAdmin->paginate(10);
           

            return view('admin.draft.bookByAdmin', compact('bookByAdmin', 'drivers', 'statuses'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
  
    public function delete($id)
    {
        try {
            Booking::find($id)->delete();
            return redirect()->route('admin.draft.index')->with('success', 'Draft booking deleted successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
}