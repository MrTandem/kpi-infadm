<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Ventas\ClientesController;
use App\Http\Controllers\Ventas\DepartamentoController;
use App\Http\Controllers\Ventas\EmpleadosController;
use App\Http\Controllers\Ventas\ProductoController;
use Illuminate\Support\Facades\Route;

//Rutas Autenticación

Route::get('/changepassword', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password');

Route::post('/changepassword', [ChangePasswordController::class, 'changePassword']);

Route::get('/resetpassword/{id}', [ChangePasswordController::class, 'showResetPasswordForm'])->name('show_reset_password_form');

Route::post('/resetpassword/{id}', [ChangePasswordController::class, 'resetPassword'])->name('reset_password');

Route::view('/login', 'auth.login')->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::view('/register', 'auth.register')->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::resource('/users', RegisteredUserController::class);

Route::get('/administationUser', [ChangePasswordController::class, 'adminstrationUser'])->name('adminUser');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('/empleados', EmpleadosController::class);

Route::resource('/clientes', ClientesController::class);

Route::resource('/departamentos', DepartamentoController::class);

Route::resource('/productos', ProductoController::class);