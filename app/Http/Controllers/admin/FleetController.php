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
            $fleet->about_car = $request->about_car;
            $fleet->price = $request->price;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/fleets'), $imageName);
                $fleet->image = $imageName;
            }
            $fleet->meet_and_greet = $request->meet_and_greet ? 1 : 0;
            $fleet->meet_and_greet_price = $request->meet_and_greet ? $request->meet_and_greet_price : 0;
            $fleet->max_passengers = $request->max_passengers;
            $fleet->max_suitecases = $request->max_suitecases;
            $fleet->max_hand_luggage = $request->max_hand_luggage;
            $fleet->min_booking_price = $request->min_booking_price;
            $fleet->price_after_10_miles = $request->price_after_10_miles;
            $fleet->price_after_20_miles = $request->price_after_20_miles;
            $fleet->price_after_30_miles = $request->price_after_30_miles;
            $fleet->price_after_40_miles = $request->price_after_40_miles;
            $fleet->price_after_50_miles = $request->price_after_50_miles;
            $fleet->price_after_60_miles = $request->price_after_60_miles;
            $fleet->price_after_70_miles = $request->price_after_70_miles;
            $fleet->price_after_80_miles = $request->price_after_80_miles;
            $fleet->price_after_90_miles = $request->price_after_90_miles;
            $fleet->price_after_100_miles = $request->price_after_100_miles;
            $fleet->price_after_110_miles = $request->price_after_110_miles;
            $fleet->price_after_120_miles = $request->price_after_120_miles;
            $fleet->price_after_130_miles = $request->price_after_130_miles;
            $fleet->price_after_140_miles = $request->price_after_140_miles;
            $fleet->price_after_150_miles = $request->price_after_150_miles;
            
            $fleet->airport_price_after_10_miles = $request->airport_price_after_10_miles;
            $fleet->airport_price_after_20_miles = $request->airport_price_after_20_miles;
            $fleet->airport_price_after_30_miles = $request->airport_price_after_30_miles;
            $fleet->airport_price_after_40_miles = $request->airport_price_after_40_miles;
            $fleet->airport_price_after_50_miles = $request->airport_price_after_50_miles;
            $fleet->airport_price_after_60_miles = $request->airport_price_after_60_miles;
            $fleet->airport_price_after_70_miles = $request->airport_price_after_70_miles;
            $fleet->airport_price_after_80_miles = $request->airport_price_after_80_miles;
            $fleet->airport_price_after_90_miles = $request->airport_price_after_90_miles;
            $fleet->airport_price_after_100_miles = $request->airport_price_after_100_miles;
            $fleet->airport_price_after_110_miles = $request->airport_price_after_110_miles;
            $fleet->airport_price_after_120_miles = $request->airport_price_after_120_miles;
            $fleet->airport_price_after_130_miles = $request->airport_price_after_130_miles;
            $fleet->airport_price_after_140_miles = $request->airport_price_after_140_miles;
            $fleet->airport_price_after_150_miles = $request->airport_price_after_150_miles;
            
            $fleet->detail_page_description = $request->detail_page_description;
            $fleet->features = $request->features;
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
            $fleet->about_car = $request->about_car;
            $fleet->price = $request->price;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/fleets'), $imageName);
                $fleet->image = $imageName;
            }
            $fleet->meet_and_greet = $request->meet_and_greet ? 1 : 0;
            $fleet->meet_and_greet_price = $request->meet_and_greet ? $request->meet_and_greet_price : 0;
            $fleet->max_passengers = $request->max_passengers;
            $fleet->max_suitecases = $request->max_suitecases;
            $fleet->max_hand_luggage = $request->max_hand_luggage;
            $fleet->min_booking_price = $request->min_booking_price;
            $fleet->price_after_10_miles = $request->price_after_10_miles;
            $fleet->price_after_20_miles = $request->price_after_20_miles;
            $fleet->price_after_30_miles = $request->price_after_30_miles;
            $fleet->price_after_40_miles = $request->price_after_40_miles;
            $fleet->price_after_50_miles = $request->price_after_50_miles;
            $fleet->price_after_60_miles = $request->price_after_60_miles;
            $fleet->price_after_70_miles = $request->price_after_70_miles;
            $fleet->price_after_80_miles = $request->price_after_80_miles;
            $fleet->price_after_90_miles = $request->price_after_90_miles;
            $fleet->price_after_100_miles = $request->price_after_100_miles;
            $fleet->price_after_110_miles = $request->price_after_110_miles;
            $fleet->price_after_120_miles = $request->price_after_120_miles;
            $fleet->price_after_130_miles = $request->price_after_130_miles;
            $fleet->price_after_140_miles = $request->price_after_140_miles;
            $fleet->price_after_150_miles = $request->price_after_150_miles;
            
            $fleet->airport_price_after_10_miles = $request->airport_price_after_10_miles;
            $fleet->airport_price_after_20_miles = $request->airport_price_after_20_miles;
            $fleet->airport_price_after_30_miles = $request->airport_price_after_30_miles;
            $fleet->airport_price_after_40_miles = $request->airport_price_after_40_miles;
            $fleet->airport_price_after_50_miles = $request->airport_price_after_50_miles;
            $fleet->airport_price_after_60_miles = $request->airport_price_after_60_miles;
            $fleet->airport_price_after_70_miles = $request->airport_price_after_70_miles;
            $fleet->airport_price_after_80_miles = $request->airport_price_after_80_miles;
            $fleet->airport_price_after_90_miles = $request->airport_price_after_90_miles;
            $fleet->airport_price_after_100_miles = $request->airport_price_after_100_miles;
            $fleet->airport_price_after_110_miles = $request->airport_price_after_110_miles;
            $fleet->airport_price_after_120_miles = $request->airport_price_after_120_miles;
            $fleet->airport_price_after_130_miles = $request->airport_price_after_130_miles;
            $fleet->airport_price_after_140_miles = $request->airport_price_after_140_miles;
            $fleet->airport_price_after_150_miles = $request->airport_price_after_150_miles;
            
            $fleet->detail_page_description = $request->detail_page_description;
            $fleet->features = $request->features;
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
