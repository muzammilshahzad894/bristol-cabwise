<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;
use Exception;
use App\Http\Requests\AddCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Fleet;
use App\Models\FleetTax;

use App\Models\Coupon;
class CouponController extends Controller
{
    
    public function index()
    {
        try {
            $dates = Coupon::paginate(10);
            return view('admin.coupon.index', compact('dates'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function create()
    {
        try {

            return view('admin.coupon.create');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function store(AddCouponRequest $request)
    {
     
        try {
            $coupon = new Coupon();
            $coupon->name = $request->name;
            $coupon->date = $request->date;
            $coupon->code = $request->code;
            $coupon->discount = $request->discount;
            $coupon->description = $request->description;
            $coupon->save();
            return redirect()->route('admin.coupons.index')->with('success', 'Service added successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function edit($id, Request $request){
        try{
            $date = Coupon::find($id);
            return view('admin.coupon.edit', compact('date'));

        } catch(Exception $e){
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
    public function update($id , UpdateCouponRequest $request){
        try{
            $date = Coupon::find($id);
            $date->name = $request->name;
            $date->date = $request->date;
            $date->code = $request->code;
            $date->discount = $request->discount;
            $date->description = $request->description;
            $date->save();
            return redirect()->route('admin.coupons.index')->with('success', 'block date updated successfully');
        } catch(Exception $e){
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');

        }
    }

    public function delete($id)
    {
        try {
            Coupon::find($id)->delete();
            return redirect()->route('admin.coupons.index')->with('success', 'block date deleted successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}