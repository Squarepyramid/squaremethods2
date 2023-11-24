<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illustration extends Model
{
    use HasFactory;

    protected $fillable=['user_upload_id', 'user_id'];

    public function user_upload()
    {
        return $this->belongsTo(Cover::class,'user_upload_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function illustration()
    {
        return $this->belongsTo(Illustration::class, 'cover_id','id');
    }
}
