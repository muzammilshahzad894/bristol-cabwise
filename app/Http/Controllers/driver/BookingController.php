<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            $bookings  = Booking::where('assigned_to', $user->id)->paginate(10);
            return view('driver.bookings.index', compact('bookings'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
