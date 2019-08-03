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


Route::get('/','FrontEndController@index')->name('index');
Route::get('/listRecipe', 'CookingRecipeController@index');
Route::get('/postAll','PostController@index')->name('postAll');
Route::get('/postAdd','PostController@create')->name('postAdd');
Route::post('/postStore','PostController@store')->name('postStore');
Route::get('/cooking','CookingRecipeController@create')->name('cookingAdd');
Route::post('/cookingStore','CookingRecipeController@store')->name('cookingStore');



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
        Route::get('/', 'AdminController@index')->name('manageCookingRecipes');
        Route::get('add', 'PostController@getAdd');
        Route::put('updateStatus', 'PostController@updateStatus');
        Route::put('updateHot', 'PostController@updateHot');
        Route::get('update/{id}', 'CookingRecipeController@edit');
        Route::post('update/{id}', 'CookingRecipeController@update');
        Route::get('delete/{id}', 'CookingRecipeController@destroy');
    });
});