<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // khái báo soft delete
    use SoftDeletes;
    protected $dates = ['deleted_at'];

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
