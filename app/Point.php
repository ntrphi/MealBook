<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
        'user_id','point',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pointable(){
        return $this->morphTo();
    }
}
