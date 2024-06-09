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

class DraftController extends Controller
{
    
    public function index()
    {
        try {
            $draftUsers  = Booking::where('is_draft', 1)->paginate(10);
            return view('admin.draft.index', compact('draftUsers'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function bookByAdmin(){
        try {
            $bookByAdmin  = Booking::where('is_draft', 1)->where('user_id', 1)->paginate(10);
            return view('admin.draft.bookByAdmin', compact('bookByAdmin'));
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
}