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
Route::get('index', 'App\Http\Controllers\EventController@index')->name('allEvent');
Route::post('store', 'App\Http\Controllers\EventController@store')->name('eventStore');
Route::get('delete/{id}', 'App\Http\Controllers\EventController@destroy')->name('eventDestroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/t', 'App\Http\Controllers\EventController@t')->name('t');