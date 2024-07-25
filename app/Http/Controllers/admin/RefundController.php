<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

use App\Models\Status;
use App\Models\Refund;

class RefundController extends Controller
{  
    public function index(){
        try {
            $refunds= Refund::get();
            dd($refunds);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}