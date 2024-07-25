<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;
use Exception;
use App\Http\Requests\AddBlockDatesRequest;
use App\Http\Requests\UpdateBlockDatesRequest;
use App\Models\Fleet;
use App\Models\FleetTax;

use App\Models\BlockDate;

class BlockDatesController extends Controller
{
    
    public function index()
    {
        try {
            $dates = BlockDate::orderBy('id', 'desc')->paginate(10);
            return view('admin.block-dates.index', compact('dates'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function create()
    {
        try {

            return view('admin.block-dates.create');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function store(AddBlockDatesRequest $request)
    {
        try {
            $blockDates = new BlockDate();
            $blockDates->name = $request->name;
            $blockDates->date_range = $request->date_range;
            $blockDates->from_time = $request->from_time;
            $blockDates->to_time = $request->to_time;
            $blockDates->save();
            return redirect()->route('admin.block-dates.index')->with('success', 'Service added successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function edit($id, Request $request){
        try{
            $date = BlockDate::find($id);
            return view('admin.block-dates.edit', compact('date'));

        } catch(Exception $e){
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
    public function update($id , UpdateBlockDatesRequest $request){
        try{
            $date = BlockDate::find($id);
            $date->name = $request->name;
            $date->date_range = $request->date_range;
            $date->from_time = $request->from_time;
            $date->to_time = $request->to_time;
            $date->save();
            return redirect()->route('admin.block-dates.index')->with('success', 'block date updated successfully');
        } catch(Exception $e){
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');

        }
    }

    public function delete($id)
    {
        try {
            BlockDate::find($id)->delete();
            return redirect()->route('admin.block-dates.index')->with('success', 'block date deleted successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
