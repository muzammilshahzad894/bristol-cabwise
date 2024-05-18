<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Car;
use App\Models\Service;
use App\Models\Fleet;

class CarsController extends Controller
{
    public function index()
    {
        try {
            $services = Service::all();
            $fleets = Fleet::all();
            $cars = Car::where('status', 1)->get();
            return view('frontend.index', compact('cars', 'services', 'fleets'));
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
