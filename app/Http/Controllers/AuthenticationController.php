<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function viewlogin(){

        return view('backend.login');
    }

     public function afterlogin(Request $request){

        $credentials=$request->except('_token');
        $check=Auth::attempt($credentials);
        // dd($check);


        if($check)
        {

            toastr()->success('logged in  successfully!');
            return redirect()->route('blogs.index');

        }
        else{

            toastr()->error('invalid credentials');

            return redirect()->back();

        }


    }

              
    public function logout(){
        Auth::logout();

        return redirect()->route('log.out')->with('successfull','Logged out');
    }

}
