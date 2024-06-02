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
use App\Models\UsedCoupon;
class UsedCouponController extends Controller
{
    
    public function index(Request $request)
{
    try {
        $code = $request->code;
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

        return response()->json(['success' => 'Coupon Valid'], 200);

    } catch (Exception $e) {
        Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}
}