<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/lista-empleados', 'Resources\EmpleadosController');
Route::resource('/lista-cargos', 'Resources\CargoController');

Route::get('/empleados', function () {
    return view('empleados');
});

Route::get('/cargos', function () {
    return view('cargos');
});

Route::get('/pagos', function () {
    return view('pagos');
});