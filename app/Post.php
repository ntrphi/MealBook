<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','content','image'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function  comment(){
        return $this->morphMany(Comment::class,'commentable');
    }
}
