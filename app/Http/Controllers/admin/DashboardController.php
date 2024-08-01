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
use App\Models\Refund;

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

    public function dashboard(Request $request)
    {
        try {
            $todayPendingBookings = Booking::where('status_id', 1)->whereDate('booking_date', date('Y-m-d'))->count();
            $todayInprogressBookings = Booking::whereIn('status_id', [2, 3, 4])->whereDate('booking_date', date('Y-m-d'))->count();
            $todayCompletedBookings = Booking::where('status_id', 5)->whereDate('booking_date', date('Y-m-d'))->count();
            $upcomingBookings = Booking::whereDate('booking_date', '>', date('Y-m-d'))->count();

            $totalCompletedBookings = Booking::where('status_id', 5)
                ->when($request->has('start_date') && $request->has('end_date'), function ($query) use ($request) {
                    $start_date = date('Y-m-d', strtotime($request->start_date));
                    $end_date = date('Y-m-d', strtotime($request->end_date));
                    return $query->whereBetween('booking_date', [$start_date, $end_date]);
                })
                ->count();
            $totalSales = Booking::where('status_id', 5)
                ->when($request->has('start_date') && $request->has('end_date'), function ($query) use ($request) {
                    $start_date = date('Y-m-d', strtotime($request->start_date));
                    $end_date = date('Y-m-d', strtotime($request->end_date));
                    return $query->whereBetween('booking_date', [$start_date, $end_date]);
                })
                ->sum('total_price');

            if ($request->has('start_date') && $request->has('end_date')) {
                $start_date = date('Y-m-d', strtotime($request->start_date));
                $end_date = date('Y-m-d', strtotime($request->end_date));
                $completedBookings = Booking::where('status_id', 5)->whereBetween('booking_date', [$start_date, $end_date])->count();
                $pendingBookings = Booking::where('status_id', 1)->whereBetween('booking_date', [$start_date, $end_date])->count();
                $inprogressBookings = Booking::whereIn('status_id', [2, 3, 4])->whereBetween('booking_date', [$start_date, $end_date])->count();
                $bookings = Booking::where('status_id', 5)->whereBetween('booking_date', [$start_date, $end_date])->pluck('id');
                $refundedBookings = Refund::whereIn('booking_id', $bookings)->count();
                $draftBookings = Booking::where('is_payment', 0)->whereBetween('booking_date', [$start_date, $end_date])->count();
            } else {
                $completedBookings = Booking::where('status_id', 5)->count();
                $pendingBookings = Booking::where('status_id', 1)->count();
                $inprogressBookings = Booking::whereIn('status_id', [2, 3, 4])->count();
                $refundedBookings = Refund::count();
                $draftBookings = Booking::where('is_payment', 0)->count();
            }

            $graphData = [$completedBookings, $pendingBookings, $inprogressBookings, $refundedBookings, $draftBookings];
            return view('admin.index', compact('todayPendingBookings', 'todayInprogressBookings', 'todayCompletedBookings', 'upcomingBookings', 'totalCompletedBookings', 'totalSales', 'graphData'));
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
