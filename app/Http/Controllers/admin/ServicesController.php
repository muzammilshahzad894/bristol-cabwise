<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\AddServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        try {
            $services = Service::paginate(10);
            return view('admin.services.index', compact('services'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(AddServiceRequest $request)
    {
        try {
            $service = new Service();
            $service->name = $request->name;
            $service->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/services');
                $image->move($destinationPath, $name);
                $service->image = $name;
            }
            $service->save();
            return redirect()->route('admin.services.index')->with('success', 'Service added successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        try {
            $service = Service::find($id);
            return view('admin.services.edit', compact('service'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(UpdateServiceRequest $request, $id)
    {
        try {
            $service = Service::find($id);
            $service->name = $request->name;
            $service->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/services');
                $image->move($destinationPath, $name);
                $service->image = $name;
            }
            $service->save();
            return redirect()->route('admin.services.index')->with('success', 'Service updated successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        try {
            $service = Service::find($id);
            $service->delete();
            return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
