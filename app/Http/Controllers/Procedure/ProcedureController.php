<?php

namespace App\Http\Controllers\Procedure;

use App\Http\Controllers\Controller;
use App\Models\Cover;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcedureController extends Controller
{
    //

    public function store(Request $request)
    {
        $id = Auth::user()->id;

        $cover_id = $request->cover_id;

        $cover = new Cover();
        $cover->user_upload_id=$cover_id;
        $cover->text=$request->cover_text;
        $cover->user_id=$id;

        $res_cover=  $cover->save();
        //return $cover;
        $procedures = $request->procedure;
        foreach ($procedures as $pro){
            //echo $pro['procedure'];
          //  continue;
            $procedure = new Procedure();
            $procedure->procedure=$pro['procedure'];
           // $procedure->cover_id=$pro['cover_id'];
            $procedure->cover_id=$cover->id;//$pro['cover_id'];
            $procedure->illustration_id=$pro['illustration_id'];
            $procedure->user_id=$id;
            $procedure->save();
        }

        //echo json_encode($data); die();

        return response()->json(['message' => 'SOP Created successfully'], 201);
    }
}
