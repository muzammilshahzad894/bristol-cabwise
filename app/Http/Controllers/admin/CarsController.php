<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\AddCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;

class CarsController extends Controller
{
    public function index()
    {
        try {
            $cars = Car::paginate(10);
            return view('admin.cars.index', compact('cars'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function create()
    {
        try {
            return view('admin.cars.create');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function store(AddCarRequest $request)
    {
        try {
            $car = new Car();
            $car->name = $request->name;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/cars');
                $image->move($destinationPath, $name);
                $car->image = $name;
            }
            $car->max_passengers = $request->max_passengers;
            $car->max_suitecases = $request->max_suitecases;
            $car->max_hand_luggage = $request->max_hand_luggage;
            $car->save();
            return redirect()->route('admin.cars.index')->with('success', 'Car added successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        try {
            $car = Car::find($id);
            return view('admin.cars.edit', compact('car'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(UpdateCarRequest $request, $id)
    {
        try {
            $car = Car::find($id);
            $car->name = $request->name;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/cars');
                $image->move($destinationPath, $name);
                $car->image = $name;
            }
            $car->max_passengers = $request->max_passengers;
            $car->max_suitecases = $request->max_suitecases;
            $car->max_hand_luggage = $request->max_hand_luggage;
            $car->save();
            return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        try {
            $car = Car::find($id);
            $car->delete();
            return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
