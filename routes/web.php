<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/threads', 'ThreadsController@index')->name('threads.index');

Route::get('/threads/create', 'ThreadsController@create')->name('threads.create');
Route::post('/threads', 'ThreadsController@store')->name('threads.store');
Route::get('/threads/{channel}/{thread}', 'ThreadsController@show')->name('threads.show');
// Route::resource('/threads', 'ThreadsController');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
Route::get('/threads/{channel}' , 'ThreadsController@index');
