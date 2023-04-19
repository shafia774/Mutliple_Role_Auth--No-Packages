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


Auth::routes(['register' => false]);

// Admin Routes
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['auth','user-role:Admin']);
