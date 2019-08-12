<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','content','image','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function  comment(){
        return $this->morphMany(Comment::class,'commentable');
        
    }


   
}
