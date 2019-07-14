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

use \Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('users', 'UserController');

Route::get('login', function () {
    return view('welcome');
})->name('login');
Route::post('/login', 'HomeController@login')->name('login');
Route::get('/logout','HomeController@logout')->name('logout');