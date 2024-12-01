<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Fleet;
use App\Models\FleetTax;

use App\Models\Coupon;
use App\Models\UsedCoupon;
class UsedCounponController extends Controller
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
        $discount = $coupon->discount;

        return response()->json(['discount' => $discount]);

    } catch (Exception $e) {
        Log::error('Exception occurred in UsedCouponController@index: ' . $e->getMessage());
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}
}