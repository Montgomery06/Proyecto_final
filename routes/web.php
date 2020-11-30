<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact','WebController@contact');
Route::get('/users','MovieController@index')->name('movies');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function(){


	Route::get('/movies','MovieController@index')->name('movies');
 	#Route::get('/movies/{id}','MovieController@show');
 	Route::get('/movies-info/{movie}','MovieController@get');
 	Route::post('/movies','MovieController@store');		 	
 	Route::put('/movies/{movie}','MovieController@update')->middleware('permission:crud categories');
	Route::get('/categories','CategoryController@index');
	Route::put('/categories','CategoryController@update');
	Route::post('/categories','CategoryController@store');
	Route::delete('/categories','CategoryController@destroy');

});
