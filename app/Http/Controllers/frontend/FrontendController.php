<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class FrontendController extends Controller
{
    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function services()
    {
        $services = Service::all();
        return view('frontend.services', compact('services'));
    }

    public function trustVoilet()
    {
        try {
            return view('frontend.truestVoilet');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching car details');
        }
    }
}
