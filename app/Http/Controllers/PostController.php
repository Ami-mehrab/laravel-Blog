<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index(){


    }
    public function create(){

        return view('blog.postcreate');
    }

    public function store (Request $request)
    {


  // Initialize image name as null
        $fileName = null;

        // logic for image upload
        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $fileName = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('blogimage', $fileName, 'public'); // stores to storage/app/public/blogimage
        }

       
       //query 
        Post::create([
            'title'   => $request->title,
            'slug'    => $request->slug,
            'content' => $request->content,
            'image'   => $fileName,
        ]);

        
      return redirect()->back();   
    }
   

 
}
