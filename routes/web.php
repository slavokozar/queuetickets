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

Route::get('/', 'ClientController@home');
Route::post('/client', 'ClientController@store');
Route::post('/ticket', 'TicketController@store');


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

