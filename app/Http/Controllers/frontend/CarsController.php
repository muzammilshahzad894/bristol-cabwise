<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Car;
use App\Models\Coupon;
use App\Models\Service;
use App\Models\Fleet;

class CarsController extends Controller
{
    public function index()
    {
        try {
            $services = Service::all();
            $coupon = Coupon::latest()->first();
            $fleets = Fleet::all();
            return view('frontend.index', compact('services', 'fleets', 'coupon'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching cars');
        }
    }
    public function carDetails($id)
    {
        try {
            $service = Service::find($id);
            $services = Service::all();
            return view('frontend.carDetail.index', compact('service', 'services'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching car details');
        }
    }
}
