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

 

Route::get('/','JoinTableController@index');  
Route::get('/search', 'JoinTableController@search');
Route::get('/unconsolidated', 'JoinTableController@unconsolidated');
Route::get('/utc/{id}', 'JoinTableController@changetoconsolidate');

Route::post('/unconsolidated', 'JoinTableController@update');
Route::put('consolidations', 'JoinTableController@update');
// Route::post('changetoconsolidate', 'JoinTableController@store');

// Route::resource('unconsolidated', 'JoinTableController');

// Export to PDF route
Route::get('downloadPDF','PDFController@downloadPDF');

Route::get('generate-pdf','HomeController@generatePDF');

Route::get('pdfview',array('as'=>'pdfview','uses'=>'PDFController@pdfview'));