<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    protected $fillable=[
        "description_activite",
        "duree",
        "technicien_id",
        "date",
        "tache_id",
        'service_id'
    ];

    public function technicien(){
        return $this->belongsTo(Technicien::class,'technicien_id', 'id');
       }
    public function task(){
        return $this->belongsTo(Tache::class,'tache_id', 'id');
          }
    public function department(){
        return $this->belongsTo(Etablissement::class,'service_id', 'id');
    }

    public $timestamps = false;
}
