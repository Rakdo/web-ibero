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

Route::get('/', ['uses' => 'App\Http\Controllers\HomeController@mainSite', 'as' => 'index']);




Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::resource('/tareas', 'App\Http\Controllers\TaskController');
	Route::resource('/proyectos', 'App\Http\Controllers\ProjectController');

	Route::get('/home', ['uses'=>'App\Http\Controllers\ProjectController@index', 'as' => 'home']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logged', [App\Http\Controllers\HomeController::class, 'Loggedin'])->name('Loggedin');
