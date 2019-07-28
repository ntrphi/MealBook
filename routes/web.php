<?php

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
});
Route::get('/listRecipe', 'CookingRecipeController@getCookingRecipeList');
Route::prefix('/admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.login');
    })->name('adminLogin');
    Route::post('/login', 'AdminController@login');
    Route::get('/home', function () {
        return view('admin.index');
    })->name('adminHome');
});