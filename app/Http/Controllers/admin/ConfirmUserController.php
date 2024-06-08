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
class ConfirmUserController extends Controller
{
    
    public function index()
    {
        try {
            $draftUsers  = Booking::where('is_payment', 1)->paginate(10);
            return view('admin.users.index', compact('draftUsers'));
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
}