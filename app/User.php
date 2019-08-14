<?php

namespace App;
use DB;
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
    public function mealCount(){
       
        return $this->mealBook()->where('user_id',$this->id)->count();
    }
    public function  cookingRecipe()
    {
        return $this->hasMany(CookingRecipe::class, 'author_id');
    }
    public function cookingCount(){
       
        return $this->cookingRecipe()->where('author_id',$this->id)->count();
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

    public function isPoint(){
     return $this->point()->where('user_id',$this->id)->sum('point');
    //eturn $this->point()->groupBy('user_id')->selectRaw('sum(point) as sum,user_id')->orderBy('sum','ASC')->where('user_id',$this->id)->get(); 
    }
}
