<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[dashboardController::class,'dashboard'])->name('dashboard');
