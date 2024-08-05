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
            
            // $user_ip  = getHostByName(getHostName());
            $userIp = getHostByName(getHostName()); // Use Laravel's request helper to get the IP address
            $userId = auth()->id(); // Get the authenticated user's ID
    
            $coupon = Coupon::where('code', $code)->first();
            if (!$coupon) {
                return response()->json(['error' => 'Coupon code is invalid'], 400);
            }
            if ($coupon->coupon_type == 'single') {
                $usedCoupon = UsedCoupon::where('coupon_id', $coupon->id)
                                        ->where(function($query) use ($userId, $userIp) {
                                            if ($userId) {
                                                $query->where('user_id', $userId);
                                            }
                                            $query->orWhere('user_ip', $userIp);
                                        })
                                        ->first();
    
                if ($usedCoupon) {
                    return response()->json(['error' => 'Coupon has already been used'], 400);
                }
            }
    
            // For non-single use, no need to check again if already checked above
            // Check if the coupon has been used by the current user
            $usedCoupon = UsedCoupon::where('coupon_id', $coupon->id)
                                    ->where('user_id', $userId)
                                    ->first();
                                    
            if ($usedCoupon) {
                return response()->json(['error' => 'Coupon has already been used'], 400);
            }
    
            // Assuming date is stored as a range like "2024-08-02 - 2024-08-29"
            [$startDate, $endDate] = explode(' - ', $coupon->date);
    
            $startDate = Carbon::parse($startDate);
            $endDate = Carbon::parse($endDate);
            $now = Carbon::now();
    
            if (!$now->between($startDate, $endDate)) {
                return response()->json(['error' => 'Coupon is not valid for the current date'], 400);
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
        
        $role = auth()->user()->role;
        $user_ip  = getHostByName(getHostName());
        if($role != 'admin'){
        $coupon = Coupon::where('code', $request->coupon)->first();
        $usedCoupon = new UsedCoupon();
        $usedCoupon->coupon_id = $coupon->id;
        $usedCoupon->user_id = auth()->id() ? auth()->id() : 0;
        $usedCoupon->user_ip = $user_ip;
        $usedCoupon->save();
        $booking = DB::table('bookings')->where('user_id', auth()->id())->orderBy('id', 'desc')->first();
        if($booking->return_id){
            $returnBooking = DB::table('bookings')->where('id', $booking->return_id)->first();
            $discount = ($returnBooking->total_price * $coupon->discount) / 100;
            $discount_price = $returnBooking->total_price - $discount;
            DB::table('bookings')->where('id', $returnBooking->id)->update(['total_price' => $discount_price]);
        }
        $discount = ($booking->total_price * $coupon->discount) / 100;
        $discount = $booking->total_price - $discount;
        DB::table('bookings')->where('id', $booking->id)->update(['total_price' => $discount]);
        return response()->json(['success' => 'Coupon has been applied successfully']);
        }

    } catch (Exception $e) {
        Log::error('Exception occurred in UsedCouponController@store: ' . $e->getMessage());
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}


}