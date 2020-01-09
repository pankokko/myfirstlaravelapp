<?php

use App\Http\Middleware\UploadSizeCheckMiddleware;
use Illuminate\Session\Middleware\StartSession;
use App\Http\Middleware\FiltereMiddleware;
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


Route::post("comments/create","commentsController@create")->name("comments/create");

Route::get("/", "itemsController@index")->name("/");
Route::get("items/search","itemsController@search");
Route::get("items/{id}/show", "itemsController@show")->name("items/{id}/show");
Route::delete('items/{id}/destroy', 'itemsController@destroy');
Route::get("items/new","itemsController@new")->name("new");
Route::post("items/new","itemsController@create");

Route::get("albums/index","albumsController@index")->name("albums/index");
Route::get("albums/new","albumsController@new")->name("albums/new");
Route::get("albums/{id}/show","albumsController@show")->name("albums/show");
Route::get("albums/{id}/detail","albumsController@detail")->name("albums/detail");
Route::get("albums/{id}/add","albumsController@add")->name("albums/add");
Route::post("albums/{id}/add","albumsController@store");
Route::post("albums/new","albumsController@create");
Route::delete('albums/{id}/destroy', 'albumsController@destroy');
Route::delete('albums/{id}/remove', 'albumsController@remove');

Route::get("categories/index","categoriesController@index")->name("categories/index");
Route::get("categories/{id}/list","categoriesController@list")->name("categories/list");


Auth::routes();
Route::get("/logout","HomeController@logout");
Route::get("users/{id}/show","usersController@show")->name("user/show");
Route::get('/home', 'HomeController@index')->name('home');