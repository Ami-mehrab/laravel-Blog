<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

   Route::get('/',[homeController::class,'home'])->name('home');  //master blade

Route::group(['prefix'=>'admin'],function(){


    //route for admin/login
    
Route::get('/login',[AuthenticationController::class,'viewlogin'])->name('view.login');
Route::post('/loggedin',[AuthenticationController::class,'afterlogin'])->name('log.in');


Route::group(['middleware'=>'auth'],function(){

    


    Route::get('/logout',[AuthenticationController::class,'logout'])->name('log.out');


//blogs post route with crud 

Route::get('/blogcreate',[PostController::class,'create'])->name('blogs.create');
Route::get('/blogindex',[PostController::class,'index'])->name('blogs.index');
Route::post('/blogstored',[PostController::class,'store'])->name('blogs.store');
Route::get('/blogs/{id}', [PostController::class, 'delete'])->name('blogs.delete');
Route::get('/blogs/edit/{id}', [PostController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{id}', [PostController::class, 'update'])->name('blogs.update');

Route::get('/blogshow/{id}',[PostController::class,'show'])->name('blogs.show');

});



});






