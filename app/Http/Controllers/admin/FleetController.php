<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\AddFleetRequest;
use App\Http\Requests\UpdateFleetRequest;
use App\Models\Fleet;
use App\Models\Service;

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
            $servicesCount = Service::count();
            return view('admin.fleets.create', compact('servicesCount'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
