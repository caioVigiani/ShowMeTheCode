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
    return redirect()->route('faleMais.consulta');
});

Route::namespace('FaleMais')->group(function(){
    Route::get('/consulte-fale-mais', 'FaleMaisController@view')->name('faleMais.consulta');
    Route::post('/resultado-fale-mais', 'FaleMaisController@resultadoFaleMais')->name('faleMais.resultado');
});

