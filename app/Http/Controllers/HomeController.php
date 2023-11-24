<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\LinkedProcedure;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    // //Method 2 To check the if the user is authentificated or not.
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        // $activites = Activite::all();
        // $taches = Tache::;
        $technicien = DB::table('techniciens')
            ->where('user_id', '=', Auth::user()->id)
            ->first();
        // dd($technicien);
        if($technicien){
            $activites = DB::table('activites')
                ->where('technicien_id', '=', $technicien->id)
                ->get();
            // dd($activites);
        }else{
            $activites=[];
            $message = "You're not integrated into any activity at this time";
        }
        return view('home',compact('technicien','activites'));
    }

    public function details($id)
    {
        //$taches = DB::table('taches')->where("taches.id", "=", $id)->get();
        //$taches = DB::table('activites')->join('taches', "taches.id", "=","activites.tache_id")->join('etats','etats.id','=','activites.etat_id')->where('activites.technicien_id',"=",$id)->get();
        //$taches = DB::table('activites')->join('taches', "taches.id", "=","activites.tache_id")->where('activites.technicien_id',"=",$id)->get();
        $taches = Activite::where('id',$id)->with('task.etat')->get()->first()->task;
        $department=Activite::where('id',$id)->with('department');
        $equipment=Activite::where('id',$id)->with('task.equipment')->first()->task->equipment;
        //dd(json_encode($equipment));
        $procedure = LinkedProcedure::where('equipment_id',$equipment->id)->with('cover')->get();
        //dd(json_encode($procedure));
        //dd(json_encode($taches));
        // return $activites;
        return view("details",compact('taches','equipment','procedure'));
    }
}
