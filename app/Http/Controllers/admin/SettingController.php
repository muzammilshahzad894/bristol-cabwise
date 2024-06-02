<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Helpers\SettingsHelper;

class SettingController extends Controller
{
    public function index()
    {
        try {
            $settings = Setting::first();
            return view('admin.settings.index', compact('settings'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
    public function update(SettingRequest $request)
    {
        try {
            $validated = $request->validated();
            
            foreach ($validated as $key => $value) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }

            // Clear the settings cache after updating
            $settingsHelper = new SettingsHelper();
            $settingsHelper->clearCache();

            return redirect()->route('admin.settings.index')->with('success', 'Setting updated successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}