<?php

use App\Http\Controllers\Ventas\ClientesController;
use App\Http\Controllers\Ventas\DepartamentoController;
use App\Http\Controllers\Ventas\EmpleadosController;
use App\Http\Controllers\Ventas\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('/empleados', EmpleadosController::class);

Route::resource('/clientes', ClientesController::class);

Route::resource('/departamentos', DepartamentoController::class);

Route::resource('/productos', ProductoController::class);