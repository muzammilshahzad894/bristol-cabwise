<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\AddDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\User;

class DriverController extends Controller
{
    public function index()
    {
        try {
            $drivers = User::where('role', 'driver')->paginate(10);
            return view('admin.drivers.index', compact('drivers'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function create()
    {
        return view('admin.drivers.create');
    }

    public function store(AddDriverRequest $request)
    {
        try {
            $data = $request->all();
            $data['role'] = 'driver';
            $data['plan_password'] = $data['password'];
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            return redirect()->route('admin.drivers.index')->with('success', 'Driver added successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        try {
            $driver = User::find($id);
            return view('admin.drivers.edit', compact('driver'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(UpdateDriverRequest $request, $id)
    {
        try {
            $data = $request->all();
            $driver = User::find($id);
            $data['plan_password'] = $data['password'];
            $data['password'] = bcrypt($data['password']);
            $driver->update($data);
            return redirect()->route('admin.drivers.index')->with('success', 'Driver updated successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        try {
            User::find($id)->delete();
            return redirect()->route('admin.drivers.index')->with('success', 'Driver deleted successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
