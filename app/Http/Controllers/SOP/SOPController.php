<?php

namespace App\Http\Controllers\SOP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SOPController extends Controller
{
    //
    public function index(Request $request){
        return view('user_dashboard.create_sop.index');
    }
}
