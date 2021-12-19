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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('usuarios', App\Http\Controllers\CustomerController::class, [
    'parameters' => [
        'usuarios' => 'customer',
    ],
    'names' => [
        'index' => 'customers.index',
        'create' => 'customers.create',
        'edit' => 'customers.edit',
        'update' => 'customers.update',
        'destroy' => 'customers.destroy',
        'store' => 'customers.store',
        'show' => 'customers.show',
    ]
]);

Route::resource('veiculos', App\Http\Controllers\VehicleController::class, [
    'parameters' => [
        'veiculos' => 'vehicle',
    ],
    'names' => [
        'index' => 'vehicles.index',
        'create' => 'vehicles.create',
        'edit' => 'vehicles.edit',
        'update' => 'vehicles.update',
        'destroy' => 'vehicles.destroy',
        'store' => 'vehicles.store',
        'show' => 'vehicles.show',
    ]
]);

Route::resource('reservas', App\Http\Controllers\ReserveController::class, [
    'parameters' => [
        'reservas' => 'reserve',
    ],
    'names' => [
        'index' => 'reserves.index',
        'create' => 'reserves.create',
        'edit' => 'reserves.edit',
        'update' => 'reserves.update',
        'destroy' => 'reserves.destroy',
        'store' => 'reserves.store',
        'show' => 'reserves.show',
    ]
]);

