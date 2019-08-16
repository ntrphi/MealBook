<?php

use Illuminate\Routing\RouteUrlGenerator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/error', function () {
    return view('error.error');
})->name('error');

Route::get('/', 'FrontEndController@index')->name('index');
Route::post('/search', 'FrontEndController@search')->name('search');
Route::get('/contact', 'FrontEndController@contact')->name('contact');
Route::get('/chef', 'FrontEndController@chef')->name('chef');

Route::get('/postAll', 'PostController@index')->name('postAll');
Route::get('/show/{id}', 'PostController@show')->name('showPost');
Route::get('/postAdd', 'PostController@create')->middleware('auth')->name('postAdd');
Route::post('/postStore', 'PostController@store')->name('postStore');

Route::get('/listRecipe', 'CookingRecipeController@index');
Route::get('/cooking', 'CookingRecipeController@create')->middleware('auth')->name('cookingAdd');
Route::post('/cookingStore', 'CookingRecipeController@store')->name('cookingStore');
Route::get('/cookingAll', 'CookingRecipeController@index')->name('cookingAll');
Route::get('/showCooking/{id}', 'CookingRecipeController@show')->name('showCooking');
Route::get('/autocomplete', 'CookingRecipeController@autocomplete')->name('autocomplete');

Route::post('/posts/{post}/comment', 'CommentController@postComment');
Route::post('/cookings/{cooking}/comment', 'CommentController@cookingComment');
Route::post('/mealbooks/{mealbook}/comment', 'CommentController@mealbookComment');

Route::get('/mealAll', 'MealBookController@index')->name('mealAll');
Route::get('/mealbook-add', 'MealBookController@create')->middleware('auth')->name('mealbookAdd');
Route::get('/mealbookShow/{id}', 'MealBookController@show')->name('showMeal');
Route::post('/mealbook-add-save', 'MealBookController@saveadd');

Route::post('/mealbooks/{name}/point', 'PointController@mealbookPoint');
Route::delete('/mealbooks/{name}/point', 'PointController@destroyMealbookPoint');
Route::post('/cookings/{name}/point', 'PointController@cookingPoint');
Route::delete('/cookings/{name}/point', 'PointController@destroyCookingPoint');



Route::get('/login', function () {
    return view('admin.login');
})->name('login');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@getLogout');
Route::get('mypage/user/{id}', 'AdminController@getUserPage')->middleware('auth')->name('userpage');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', 'AdminController@getDashboard')->name('dashboard');
    Route::prefix('cooking-recipes')->group(function () {
        Route::get('/', 'AdminController@getListCookingRecipes')->name('manageCookingRecipes');
        Route::post('cookingRestore', 'CookingRecipeController@restore')->name('cookingRestore');
        Route::get('index', 'CookingRecipeController@index');
        Route::get('update/{id} ', 'CookingRecipeController@edit')->name('cookingEdit');
        Route::post('update', 'CookingRecipeController@update')->name('managerCookingStore');
        Route::get('delete/{id}', 'CookingRecipeController@destroy')->name('cooking.delete');
        Route::get('restore/{id}', 'CookingRecipeController@restore')->middleware('role')->name('cooking.restore');
    });
    Route::group(['prefix' => 'user', 'middleware' => 'role'], function () {
        Route::get('/', 'AdminController@getUserList')->name('list-author');
        Route::post('add', 'UserController@postAdd');
        Route::get('upgrade/{id}', 'UserController@UpOrDownGrade')->name('upgradeToAdmin');
        Route::get('delete/{id}', 'UserController@delete')->name('user.delete');
        Route::get('restore/{id}', 'UserController@restore')->name('user.restore');
    });
    Route::group(['prefix' => 'dish-type', 'middleware' => 'role'], function () {
        Route::get('/', 'AdminController@getDishTypeList')->name('list-dishtype');
        Route::post('add', 'DishtypeController@add');
        // Route::get('upgrade/{id}', 'UserController@UpOrDownGrade')->name('upgradeToAdmin');
        Route::get('delete/{id}', 'DishtypeController@delete')->name('dishtype.delete');
    });
    Route::group(['prefix' => 'posts', 'middleware' => 'role'], function () {
        Route::get('/list-post', 'PostController@index')->name('list-post');

        Route::get('postEdit/{id}', 'PostController@edit')->name('postEdit');
        Route::post('update', 'PostController@update')->name('managerPost');
        Route::get('delete/{id}', 'PostController@destroy')->name('post.delete');
        Route::get('restore/{id}', 'PostController@restore')->name('post.restore');
    });
    Route::prefix('mealbook')->group(function () {
        Route::get('/', 'MealbookController@index')->name('mealbook.list');

        Route::get('postEdit/{id}', 'MealbookController@edit')->name('mealbook.edit');
        Route::post('update', 'MealbookController@update')->name('mealbook.update');
        Route::get('delete/{id}', 'MealbookController@destroy')->name('mealbook.delete');
        Route::get('restore/{id}', 'MealbookController@restore')->name('mealbook.restore');
    });
    Route::group(['prefix' => 'comment', 'middleware' => 'role'], function () {
        Route::get('list-comment', 'CommentController@index')->name('list.comment');
        Route::get('delete/{id}', 'CommentController@delete');
    });
});
