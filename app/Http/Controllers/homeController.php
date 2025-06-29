<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class homeController extends Controller
{
       public function home(){

       $blog=Post::all();
        return view('master',compact('blog'));
    }

}
