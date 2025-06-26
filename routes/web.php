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

//blogs post route with crud 

Route::get('/blogcreate',[PostController::class,'create'])->name('blogs.create');
Route::get('/blogindex',[PostController::class,'index'])->name('blogs.index');
Route::post('/blogstored',[PostController::class,'store'])->name('blogs.store');


Route::get('/blogs/{id}', [PostController::class, 'destroy'])->name('blogs.destroy');

