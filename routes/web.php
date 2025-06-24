<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[homeController::class,'home'])->name('home');

Route::get('/blogview',[PostController::class,'index'])->name('Blog');
