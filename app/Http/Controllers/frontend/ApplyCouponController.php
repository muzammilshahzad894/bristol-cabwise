<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\UsedCoupon;
class ApplyCouponController extends Controller
{
    
    public function index($code)
{
    try {
        $code = $code;
        $coupon = Coupon::where('code', $code)->first();
        if (!$coupon) {
            return response()->json(['error' => 'Coupon code is invalid'], 400);
        }
        $usedCoupon = UsedCoupon::where('coupon_id', $coupon->id)
                                ->where('user_id', auth()->id())
                                ->first();
        if ($usedCoupon) {
            return response()->json(['error' => 'Coupon has already been used'], 400);
        }
        if (Carbon::parse($coupon->date)->isBefore(now())) {
            return response()->json(['error' => 'Coupon has expired'], 400);
        }

        $discount = $coupon->discount;

        return response()->json(['discount' => $discount]);

    } catch (Exception $e) {
        Log::error('Exception occurred in UsedCouponController@index: ' . $e->getMessage());
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}
public function store(Request $request)
{
    try {
        $coupon = Coupon::where('code', $request->coupon)->first();
        $usedCoupon = new UsedCoupon();
        $usedCoupon->coupon_id = $coupon->id;
        $usedCoupon->user_id = auth()->id();
        $usedCoupon->save();

        return response()->json(['success' => 'Coupon has been applied successfully']);

    } catch (Exception $e) {
        Log::error('Exception occurred in UsedCouponController@store: ' . $e->getMessage());
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}


}