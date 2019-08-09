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


Route::get('/','FrontEndController@index')->name('index');
Route::get('/listRecipe', 'CookingRecipeController@index');
Route::get('/contact','FrontEndController@contact')->name('contact');
Route::get('/chef','FrontEndController@chef')->name('chef');
Route::get('/postAll','PostController@index')->name('postAll');
Route::get('/show/{id}','PostController@show')->name('showPost');
Route::get('/postAdd','PostController@create')->name('postAdd');
Route::post('/postStore','PostController@store')->name('postStore');
Route::get('/cooking','CookingRecipeController@create')->name('cookingAdd');
Route::post('/cookingStore','CookingRecipeController@store')->name('cookingStore');
Route::get('/cookingAll','CookingRecipeController@index')->name('cookingAll');
Route::get('/showCooking/{id}','CookingRecipeController@show')->name('showCooking');
Route::post('/posts/{post}/comment','CommentController@postComment');
Route::post('/cookings/{cooking}/comment','CommentController@cookingComment');
Route::post('/mealbooks/{mealbook}/comment','CommentController@mealbookComment');
Route::get('/mealAll','MealBookController@index')->name('mealAll');
Route::get('/mealbook-add', 'MealBookController@create')->name('mealbookAdd');
Route::get('/mealbookShow/{id}','MealBookController@show')->name('showMeal');
Route::post('/mealbook-add-save', 'MealBookController@saveadd');
Route::get('/autocomplete','CookingRecipeController@autocomplete')->name('autocomplete');

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
        Route::get('index', 'CookingRecipeController@index');
        Route::get('update/{id} ', 'CookingRecipeController@edit')->name('cookingEdit');
        Route::post('update', 'CookingRecipeController@update')->name('managerCookingStore');
        Route::get('delete/{id}', 'CookingRecipeController@destroy');
    });
    Route::prefix('user')->group(function () {
        Route::get('/', 'AdminController@getUserList')->name('list-author');
        Route::post('add', 'UserController@postAdd');
        Route::get('upgrade/{id}', 'UserController@UpOrDownGrade')->name('upgradeToAdmin');
        Route::get('delete/{id}', 'UserController@delete')->name('user.delete');
        Route::get('restore/{id}', 'UserController@restore')->name('user.restore');

    });
    Route::prefix('dish-type')->group(function () {
        Route::get('/', 'AdminController@getDishTypeList')->name('list-dishtype');
        // Route::post('add', 'UserController@postAdd');
        // Route::get('upgrade/{id}', 'UserController@UpOrDownGrade')->name('upgradeToAdmin');
        Route::get('delete/{id}', 'DishtypeController@delete')->name('dishtype.delete');
        // Route::get('restore/{id}', 'UserController@restore')->name('user.restore');

    });
});