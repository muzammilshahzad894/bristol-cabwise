<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Models\Fleet;
use App\Models\Service;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            return redirect()->route('admin.dashboard');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function dashboard()
    {
        try {
            $todayPendingBookings = Booking::where('status_id', 1)->whereDate('booking_date', date('Y-m-d'))->count();
            // $todayInprogressBookings where status 2, 3, 4
            $todayInprogressBookings = Booking::whereIn('status_id', [2, 3, 4])->whereDate('booking_date', date('Y-m-d'))->count();
            $todayCompletedBookings = Booking::where('status_id', 5)->whereDate('booking_date', date('Y-m-d'))->count();
            $upcomingBookings = Booking::whereDate('booking_date', '>', date('Y-m-d'))->count();
            return view('admin.index', compact('todayPendingBookings', 'todayInprogressBookings', 'todayCompletedBookings', 'upcomingBookings'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function profile()
    {
        try {
            $user = User::find(auth()->user()->id);
            return view('admin.profile', compact('user'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function profileUpdate(UpdateProfileRequest $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password ? bcrypt($request->password) : $user->password;
            $user->save();
            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
