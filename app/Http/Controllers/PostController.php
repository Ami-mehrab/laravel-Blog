<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index(){

        $blog=Post::all();

        return view('blog.postindex',compact('blog'));
    }

    public function create(){

        return view('blog.postcreate');
    }

    public function store (Request $request)
    {


        //form validation 




  // Initialize image name as null
        $fileName = null;

        // logic for image upload

        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $fileName = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/blogimage', $fileName, 'public'); // stores to storage/app/public/blogimage
        }

       
       //query 
        Post::create([
            'title'   => $request->title,
            'slug'    => $request->slug,
            'content' => $request->content,
            'image'   => $fileName,
        ]);

        // dd($request->all());
         toastr()->success('A BlogPost has been created successfully.');

      return redirect()->route('blogs.index');

    }

    public function delete($id){
     Post::find($id)->delete();


    return redirect()->route('blogs.index');

}

public function edit($id){

    $blog =Post::findOrFail($id);

    return view('blog.edit',compact('blog'));

}
public function update(Request $request,$id){



    $validated =  $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255|unique:posts,slug,' . $id,
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);



    $blog = Post::findOrFail($id);
    $blog->fill($validated);                 // auto-fill title, slug, content

    if ($request->hasFile('image'))
     {

        $blog->image = $request->file('image')->store('blogimage', 'public');
    }

    $blog->save();

    return redirect()->route('blogs.index')->with('success', 'Post updated successfully!');


}
public function show($id){

      $blog=Post::find($id);

    return view('blog.show',compact('blog'));
}

}
