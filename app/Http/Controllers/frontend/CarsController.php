<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Car;

class CarsController extends Controller
{
    public function index()
    {
        try {
            $cars = Car::where('status', 1)->get();
            return view('frontend.index', compact('cars'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching cars');
        }
    }
    public function carDetails()
    {
        try {
            return view('frontend.carDetail.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching car details');
        }
    }
}
