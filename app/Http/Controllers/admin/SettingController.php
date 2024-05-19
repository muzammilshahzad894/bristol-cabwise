<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;
use Exception;
use App\Http\Requests\AddSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Fleet;
use App\Models\FleetTax;

use App\Models\Setting;

class SettingController extends Controller
{
    
    public function index()
    {
        try {
            $dates = Setting::paginate(10);
            return view('admin.setting.index', compact('dates'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function create()
    {
        try {

            return view('admin.setting.create');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function store(AddSettingRequest $request)
    {
     
        try {
            $blockDates = new Setting();
            $blockDates->name = $request->name;
            $blockDates->date_range = $request->date_range;
            $blockDates->save();
            return redirect()->route('admin.settings.index')->with('success', 'Service added successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function edit($id, Request $request){
        try{
            $date = Setting::find($id);
            return view('admin.setting.edit', compact('date'));

        } catch(Exception $e){
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
    public function update($id , UpdateSettingRequest $request){
        try{
            $date = Setting::find($id);
            $date->name = $request->name;
            $date->date_range = $request->date_range;
            $date->save();
            return redirect()->route('admin.settings.index')->with('success', 'block date updated successfully');
        } catch(Exception $e){
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');

        }
    }

    public function delete($id)
    {
        try {
            Setting::find($id)->delete();
            return redirect()->route('admin.settings.index')->with('success', 'block date deleted successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
