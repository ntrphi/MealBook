<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CookingRecipe extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'avatar', 'ingredient', 'recipe',  'dish_type_id', 'author_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function dishType()
    {
        return $this->belongsTo(DishType::class, 'dish_type_id');
    }
    public function  comment()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function  point()
    {
        return $this->morphOne(Point::class, 'pointable');
    }

    public function isPoint()
    {
        return $this->point()->where('user_id', auth()->id())->count() > 0;
    }
    public function mealBookDishes()
    {
        return $this->belongsToMany('App\MealBook','meal_book_dishes','cooking_recipe_id','meal_book_id');
    }    
}
