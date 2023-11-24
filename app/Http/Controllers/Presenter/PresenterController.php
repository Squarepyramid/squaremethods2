<?php

namespace App\Http\Controllers\Presenter;

use App\Http\Controllers\Controller;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PresenterController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index($id){
        $procedures = Procedure::where('cover_id',$id )->with('illustration')->get();
        return view('presenter.index',compact('procedures'));
    }
}
