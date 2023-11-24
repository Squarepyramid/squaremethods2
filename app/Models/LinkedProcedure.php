<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkedProcedure extends Model
{
    use HasFactory;

    public function equipment()
    {
        return $this->belongsTo(Equipement::class, 'equipment_id');
    }
    public function cover()
    {
        return $this->belongsTo(Cover::class, 'cover_id');
    }
}
