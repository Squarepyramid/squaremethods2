<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    protected $fillable=['illustration_id','çover_id','procedure', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

//    public function cover()
//    {
//        return $this->belongsTo(UserUpload::class, 'çover_id','id');
//    }
    public function illustration()
    {
        return $this->belongsTo(UserUpload::class, 'illustration_id','id');
    }

    public function cover()
    {
        return $this->belongsTo(Cover::class,'cover_id');
    }
}
