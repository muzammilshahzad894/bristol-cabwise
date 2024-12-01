<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Booking;
use App\Models\UsedCoupon;
class ApplyCouponController extends Controller
{

    public function index($code)
    {
        try {

            // $user_ip  = getHostByName(getHostName());
            $userIp = getHostByName(getHostName()); // Use Laravel's request helper to get the IP address
            $userId = auth()->id();
            $role = auth()->user()->role ?? '';
            $usedCoupon = "";

            $coupon = Coupon::where('code', $code)->first();

            if (!$coupon) {
                return response()->json(['error' => 'Coupon code is invalid'], 400);
            }
            if ($coupon->coupon_type == 'single' && $role !== 'admin') {
                $usedCoupon = UsedCoupon::where('coupon_id', $coupon->id)
                    ->where(function ($query) use ($userId, $userIp) {
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
            if (!empty($userId) && auth()->user()->role != 'admin') {
                $usedCoupon = UsedCoupon::where('coupon_id', $coupon->id)
                    ->where('user_id', $userId)
                    ->first();
            }
            if ($usedCoupon) {
                return response()->json(['error' => 'Coupon has already been used'], 400);
            }

            // Assuming date is stored as a range like "2024-08-02 - 2024-08-29"
            if ($coupon->date) {
                [$startDate, $endDate] = explode(' - ', $coupon->date);
                $startDate = Carbon::parse($startDate);
                $endDate = Carbon::parse($endDate);
                $now = Carbon::now();
                if (!$now->between($startDate, $endDate)) {
                    return response()->json(['error' => 'Coupon is not valid for the current date'], 400);
                }
                $discount = $coupon->discount;
            } else {

                $discount = $coupon->discount;
            }

            return response()->json(['discount' => $discount]);

        } catch (Exception $e) {
            Log::error('Exception occurred in UsedCouponController@index: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $user_ip = getHostByName(getHostName());
            $coupon = Coupon::where('code', $request->coupon)->first();
            $usedCoupon = new UsedCoupon();
            $usedCoupon->coupon_id = $coupon->id;
            $usedCoupon->user_id = auth()->id() ?: 0;  // If no user is logged in, set to 0
            $usedCoupon->user_ip = $user_ip;
            $usedCoupon->save();
            $booking = Booking::where('id', $request->booking_id)->first();
       
            if (!$booking) {
                return response()->json(['error' => 'Booking not found'], 404);
            }
            if ($booking->return_id !== null) {
                $returnBooking = Booking::find($booking->return_id);
                if ($returnBooking) {
                    $discount = ($returnBooking->total_price * $coupon->discount) / 100;
                    $discount_price = $returnBooking->total_price - $discount;
                    $returnBooking->update(['total_price' => $discount_price]);
                } else {
                    return response()->json(['error' => 'Return booking not found'], 404);
                }
            }
    
            $discount = ($booking->total_price * $coupon->discount) / 100;
            $discount_price = $booking->total_price - $discount;
            $booking->discount_price = $discount_price;
            $booking->discount_percentage = $coupon->discount;
            $booking->coupon_id = $coupon->id;
            $booking->save();
            // $booking->update([
            //     'discount_price' => $discount_price,
            //     'discount_percentage' => $coupon->discount,
            //     'coupon_id' => $coupon->id,
            // ]);
    
            return response()->json(['success' => 'Coupon has been applied successfully']);
            
        } catch (Exception $e) {
            // Log the exception
            Log::error('Exception occurred in UsedCouponController@store: ' . $e->getMessage());
           
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    



}