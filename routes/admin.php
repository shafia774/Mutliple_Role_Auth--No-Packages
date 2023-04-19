<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\PincodeController;
use App\Http\Controllers\CustomerController;



// Admin Routes

Route::resource('countries', CountriesController::class);
Route::resource('districts', DistrictController::class);
Route::resource('states', StateController::class);
Route::resource('picodes', PincodeController::class);
Route::resource('customers', CustomerController::class);