<?php

use App\Http\Controllers\Ventas\ClientesController;
use App\Http\Controllers\Ventas\EmpleadosController;
use App\Http\Controllers\Ventas\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/empleados', [EmpleadosController::class,'index'])->name('empleados');

Route::resource('/clientes', ClientesController::class);

Route::resource('/productos', ProductoController::class);