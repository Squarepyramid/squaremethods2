<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $table = "taches";

    protected $fillable = ["description","date","duree","equipment_id"];

    public $timestamps = false;

    public function etat(){
        return $this->hasOne(Etat::class, 'tach_id','id');
    }

    public function equipment(){
        return $this->belongsTo(Equipement::class,'equipment_id','id');
    }
}

