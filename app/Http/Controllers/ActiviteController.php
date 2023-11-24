<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Etablissement;
use App\Models\Etat;
use App\Models\Service;
use App\Models\Tache;
use App\Models\Technicien;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $activites = Activite::with('technicien.user')->with('task.etat')->  get();
        /*$activites  = DB::table('activites')
        ->join('etats','etats.id','=','activites.etat_id')
        ->join('techniciens','techniciens.id','=','activites.technicien_id')
        ->join('taches', "taches.id", "=","activites.tache_id")
        ->select('etats.*', 'taches.*','techniciens.*','activites.*')
        ->get();*/
        // return($activites);

        return view('services.activite.index',compact('activites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taches = Tache::all();
        $services=Etablissement::all();
        $techniciens = DB::table('techniciens')
        ->join('users','users.id','=','techniciens.user_id')
        ->select('users.*', 'techniciens.*')
        ->get();

        //$etat = Etat::all();
        // return $techniciens;
        return view('services.activite.create',compact('techniciens','taches','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "description" => "required",
            "duree" => "required",
            "technicien_id" => "required",
            "date" => "required",
            "tache_id" => "required",
            "service_id"=>"required"
        ];
        $customMessages = [
            'description.required' => 'The description field is required.',
            'duree.required' => 'The time field is required.',
            'technicien_id.required' => 'The technicien_id field is required.',
            'tache_id.required' => 'The task_id field is required.',
            'date.required' => 'The date field is required.',
            "service_id"=>'The service_id field is required.'
        ];
        $request->validate($rules,$customMessages);

        // dd('here');
        $activite = new Activite;



        $activite->description = $request->description;
        $activite->duree = $request->duree;
        $activite->technicien_id = $request->technicien_id;
        $activite->date = $request->date;
        $activite->tache_id = $request->tache_id;
        $activite->service_id=$request->service_id;

        $activite->save();

        // Activite::create(
        //    [ "description" => $request->description,
        //     "duree" => $request->duree,
        //     "technicien_id " => $request->technicien_id ,
        //     "date" => $request->date
        //     ]
        // );
        return redirect()->route("activites.index")->with('success',"The item has been added successfully");
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
        $taches = Tache::all();
        $etats = Etat::all();
        $techniciens = DB::table('techniciens')
        ->join('users','users.id','=','techniciens.user_id')
        ->select('users.*', 'techniciens.*')
        ->get();

        $activite  = DB::table('activites')
        ->join('techniciens','techniciens.id','=','activites.technicien_id')
        ->join('taches', "taches.id", "=","activites.tache_id")
        ->where('activites.id',"=",$id)
        ->select('taches.*','techniciens.*','activites.*')
        ->first();

        $technicien = Technicien::with('user')->get();/*DB::table('techniciens')
        ->join('users','users.id','=','techniciens.user_id')
        ->select('users.*', 'techniciens.*')
        ->where('techniciens.user_id','=',$id)
        ->first();*/
        // return $technicien;
        return view("services.activite.update",compact('id','taches','technicien','techniciens','etats',"activite"));
    }

    public function edititem($id)
    {
        //dd($id);
        $act= Activite::where('id', $id)->with('technicien')->get()->first();
        //dd(json_encode( $act));
        $taches = Tache::all();
        $etats = Etat::all();
        $techniciens = DB::table('techniciens')
            ->join('users','users.id','=','techniciens.user_id')
            ->select('users.*', 'techniciens.*')
            ->get();
       //dd(json_encode($techniciens));
        $activite  = DB::table('activites')
            ->join('techniciens','techniciens.id','=','activites.technicien_id')
            ->join('taches', "taches.id", "=","activites.tache_id")
            ->where('activites.id',"=",$id)
            ->select('taches.*','techniciens.*','activites.*')
            ->first();

        $technicien = $act->technicien;//Technicien::with('user')->get();/*DB::table('techniciens')
//            ->join('users','users.id','=','techniciens.user_id')
//            ->select('users.*', 'techniciens.*')
//            ->where('techniciens.user_id','=',$id)
//            ->first();
        //dd(json_encode( $technicien));
         //return $technicien;

        return view("services.activite.update",compact('id','taches','technicien','techniciens','etats',"activite"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                "description" => "required",
                "duree" => "required",
                "technicien_id" => "required",
                "date" => "required",
                "tache_id" => "required",
            ]
        );
        $activite = Activite::find($id);

        $activite->description_activite = $request->description;
        $activite->duree = $request->duree;
        $activite->technicien_id = $request->technicien_id;
        $activite->date = $request->date;
        $activite->tache_id = $request->tache_id;
        $activite->etat_id = $request->etat_id;

        $activite->update();
        return redirect()->route("activites.index")->with('success',"l'element a éte modifié avec succées");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activite = Activite::find($id);
        $activite->delete();

        return redirect()->route("activites.index")->with('success',"l'element a éte supprimer avec succées");
    }
}
