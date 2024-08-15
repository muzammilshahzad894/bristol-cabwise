<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\AddServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Models\FleetTax;

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
            $service->tag = $request->tag;
            $service->short_description = $request->short_description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/services');
                $image->move($destinationPath, $name);
                $service->image = $name;
            }
            $service->detail_page_tag = $request->detail_page_tag;
            $service->detail_page_first_heading = $request->detail_page_first_heading;
            $service->detail_page_second_heading = $request->detail_page_second_heading;
            $service->detail_page_description = $request->detail_page_description;
            $service->detail_page_features = $request->detail_page_features;
            $service->save();

            $this->storeTaxes($request, $service);
            return redirect()->route('admin.services.index')->with('success', 'Service added successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        try {

            $fleetTaxes = FleetTax::where('service_id', $id)->get();
            $service = Service::find($id);
            return view('admin.services.edit', compact('service', 'fleetTaxes'));
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
            $service->tag = $request->tag;
            $service->short_description = $request->short_description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/services');
                $image->move($destinationPath, $name);
                $service->image = $name;
            }
            $service->detail_page_tag = $request->detail_page_tag;
            $service->detail_page_first_heading = $request->detail_page_first_heading;
            $service->detail_page_second_heading = $request->detail_page_second_heading;
            $service->detail_page_description = $request->detail_page_description;
            $service->detail_page_features = $request->detail_page_features;
            $service->save();

            FleetTax::where('service_id', $service->id)->delete();
            $this->storeTaxes($request, $service);
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
            FleetTax::where('service_id', $service->id)->delete();
            $service->delete();
            return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    private function storeTaxes($request, $service)
    {
        if ($request->has('taxes')) {
            foreach ($request->taxes as $tax) {

                if (!empty($tax['name']) && !empty($tax['price'])) {
                    $fleetTax = new FleetTax();
                    $fleetTax->service_id = $service->id;
                    $fleetTax->fleet_id = 0;
                    $fleetTax->name = $tax['name'];
                    $fleetTax->price = $tax['price'];
                    $fleetTax->save();
                }
            }
        }
    }
}
