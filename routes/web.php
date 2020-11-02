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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

Route::get('/', 'App\Http\Controllers\BlogController@index');

Route::get('/newEntry', 'App\Http\Controllers\BlogController@show');
Route::get('/random', 'App\Http\Controllers\BlogController@showrandom');

Route::post('/newEntry', 'App\Http\Controllers\BlogController@store')->name('addEntry');

Route::get('/entry/{id}', 'App\Http\Controllers\BlogController@display');

Route::get('/entry/delete/{id}', 'App\Http\Controllers\BlogController@delete');

Route::get('/entry/edit/{id}', 'App\Http\Controllers\BlogController@showform');

Route::post('edit', 'App\Http\Controllers\BlogController@update')->name('updateEntry');