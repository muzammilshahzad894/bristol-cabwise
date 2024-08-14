<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Quotation;


use Exception;

use App\Models\User;

class QuotationController extends Controller
{
    public function getquote()
    {
        try {
            $quotations = Quotation::with('fleet')
            ->orderBy('created_at', 'desc') // or any other column to sort by
            ->paginate(10);
            // dd($quotations)
            return view('admin.quotations.index', compact('quotations'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
