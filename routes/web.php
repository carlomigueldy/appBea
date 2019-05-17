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

 

Route::get('/','JoinTableController@show');  
Route::get('/search', 'JoinTableController@search');
Route::get('unconsolidated', 'JoinTableController@unconsolidated');
Route::get('/utc/{id}', 'JoinTableController@changetoconsolidate');

Route::post('/unconsolidated', 'JoinTableController@changetoconsolidate');

Route::resource('unconsolidated', 'JointTableController');