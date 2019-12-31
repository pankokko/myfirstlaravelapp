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

Route::get("/", "itemsController@index")->name("/");
Route::get("items/search","itemsController@search");
Route::get("items/{id}/show", "itemsController@show")->name("items/{id}/show");
Route::delete('items/{id}/destroy', 'itemsController@destroy');
Route::get("items/new","itemsController@new")->name("new");
Route::post("items/new","itemsController@create");



Auth::routes();
Route::get("/logout","HomeController@logout");
Route::get("users/{id}/show","usersController@show")->name("user/show");
Route::get('/home', 'HomeController@index')->name('home');