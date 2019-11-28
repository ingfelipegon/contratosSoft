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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::any('/publico/{any?}', 'PublicoController@index')->where('any','.*');
Route::any('/home/{any?}', 'HomeController@index')->where('any','.*')->middleware('auth');
Route::get('exportar_pdf', 'AdminApi\AtencionVictimasController@exportar_pdf');
// Route::resource('api/adquisiciones','AdminApi\AdquisicionesController');
// Route::post('uploadFile','AdminApi\FileController@uploadFile');
// Route::get('tipo_documentos','AxiosController@listar_documentos');


//Route::get('/home', 'HomeController@index')->name('home');
