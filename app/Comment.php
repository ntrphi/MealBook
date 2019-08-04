<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'title','content','user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function mealBook(){
        return $this->morphTo();
    }
    
    public function point(){
        return $this->belongsTo(Point::class);
    }
}
