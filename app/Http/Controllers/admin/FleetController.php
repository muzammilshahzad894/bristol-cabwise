<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Http\Requests\AddFleetRequest;
use App\Http\Requests\UpdateFleetRequest;
use App\Models\Fleet;
use App\Models\FleetTax;

class FleetController extends Controller
{
    public function index()
    {
        try {
            $fleets = Fleet::paginate(10);
            return view('admin.fleets.index', compact('fleets'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function create()
    {
        try {
            return view('admin.fleets.create');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function store(AddFleetRequest $request)
    {
        try {
            DB::beginTransaction();

            $fleet = new Fleet();
            $fleet->name = $request->name;
            $fleet->price = $request->price;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/fleets'), $imageName);
                $fleet->image = $imageName;
            }
            $fleet->save();

            $this->storeTaxes($request, $fleet);

            DB::commit();
            return redirect()->route('admin.fleets.index')->with('success', 'Fleet added successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    private function storeTaxes($request, $fleet)
    {
        if ($request->has('taxes')) {
            foreach ($request->taxes as $tax) {
                if (!empty($tax['name']) && !empty($tax['price'])) {
                    $fleetTax = new FleetTax();
                    $fleetTax->fleet_id = $fleet->id;
                    $fleetTax->name = $tax['name'];
                    $fleetTax->price = $tax['price'];
                    $fleetTax->save();
                }
            }
        }
    }

    public function edit($id)
    {
        try {
            $fleet = Fleet::find($id);
            $fleetTaxes = FleetTax::where('fleet_id', $id)->get();
            return view('admin.fleets.edit', compact('fleet', 'fleetTaxes'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(UpdateFleetRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $fleet = Fleet::find($id);
            $fleet->name = $request->name;
            $fleet->price = $request->price;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/fleets'), $imageName);
                $fleet->image = $imageName;
            }
            $fleet->save();

            FleetTax::where('fleet_id', $id)->delete();
            $this->storeTaxes($request, $fleet);

            DB::commit();
            return redirect()->route('admin.fleets.index')->with('success', 'Fleet updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        try {
            Fleet::find($id)->delete();
            FleetTax::where('fleet_id', $id)->delete();
            return redirect()->route('admin.fleets.index')->with('success', 'Fleet deleted successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
