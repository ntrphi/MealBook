<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function  mealBook()
    {
        return $this->hasMany(MealBook::class);
    }
    public function  cookingRecipe()
    {
        return $this->hasMany(CookingRecipe::class, 'author_id');
    }
    public function  post()
    {
        return $this->hasMany(Post::class);
    }
    public function  comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function  point()
    {
        return $this->hasMany(Point::class);
    }
}
