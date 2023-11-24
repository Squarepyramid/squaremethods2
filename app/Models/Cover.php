<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    use HasFactory;

    protected $fillable=['user_upload_id', 'user_id','text'];

    public function user_upload()
    {
        return $this->belongsTo(Cover::class,'user_upload_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function procedures()
    {
        return $this->hasMany(Procedure::class,'cover_id');
    }
}
