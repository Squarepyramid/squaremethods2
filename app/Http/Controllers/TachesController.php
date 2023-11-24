<?php

namespace App\Http\Controllers;

use App\Enums\State;
use App\Models\Equipement;
use App\Models\Etat;
use Illuminate\Http\Request;

use App\Models\Tache;

class TachesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $this->middleware('auth');

        $tache = Tache::with('equipment')->get();

        return view("services.taches.index",["taches"=>$tache]);
    }


    public function create()
    {
        $equipment = Equipement::all();

        return view("services.taches.create", compact('equipment'));
    }


    public function store(Request $request)
    {
        $request->validate(['equipment'=>'required', 'description'=>'required','date'=>'required','duree'=>'required']);
        $tache = new Tache;
        $tache->description = $request->input("description");
        $tache->date = $request->input("date");
        $tache->duree = $request->input("duree");
        $tache->equipment_id=$request->input('equipment');
        $etat = new Etat();
        $tache->save();
        $etat->tach_id = $tache->id;
        $etat->etat=State::notyet;
        $etat->save();

        /*
         "Not yet","in progress","finished"
         */

        return redirect('services/taches');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tache = Tache::find($id);
        $equipment = Equipement::all();

        return view('services.taches.update',['tache'=>$tache,"id"=>$id,'equipment'=>$equipment]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['equipment'=>'required', 'description'=>'required','date'=>'required','duree'=>'required']);
        $tache = Tache::find($id);

        $tache->description = $request->input("description");
        $tache->date = $request->input("date");
        $tache->duree = $request->input("duree");
        $tache->equipment_id=$request->input('equipment');

        $tache->save();

        return redirect('services/taches');
      }


    public function destroy($id)
    {
        $tache = Tache::find($id);

        $tache->delete();

        return redirect('services/taches');
    }
}
