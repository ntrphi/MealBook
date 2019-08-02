<?php
use Illuminate\Routing\RouteUrlGenerator;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/listRecipe', 'CookingRecipeController@getCookingRecipeList');
Route::get('login', 'LoginController@getLogin');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@getLogout');
Route::get('mypage/user/{id}', 'AdminController@getUserPage' )->middleware('auth')->name('userpage');
Route::group(['prefix' => 'admin', 'middleware' => 'role'], function(){
    Route::get('/home','AdminController@getDashboard' )->name('dashboard');
    Route::prefix('cooking-recipes')->group(function () {
        Route::get('/', 'AdminController@getListCookingRecipes')->name('manageCookingRecipes');
        Route::get('add', 'PostController@getAdd');
        Route::put('updateStatus', 'PostController@updateStatus');
        Route::put('updateHot', 'PostController@updateHot');
        Route::post('add', 'PostController@postAdd');
        Route::get('update/{id}', 'CookingRecipeController@getUpdateRecipe');
        Route::post('update/{id}', 'CookingRecipeController@postUpdateRecipe');
        Route::get('delete/{id}', 'CookingRecipeController@getDelete');
    });
});