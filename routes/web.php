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

// Route::get('/', function () {
//     return view('welcome');    
// });


Route::get('/viewpdf', 'Carcontroller@openPDF');

Route::resource('backend/cars', 'CarController');
Route::get('html-to-pdf', ['as'=>'HtmlToPDF','uses'=>'CarController@htmlToPDF']);
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// para que ande con vue tengo que desactivar las rutas de arriba
Route::get('/{any}', 'ExampleComponentController@index')->where('any', '.*');
