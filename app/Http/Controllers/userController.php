<?php

namespace App\Http\Controllers;

use Auth;
use App\comment;
use Illuminate\Http\Request;

class userController extends Controller
{
	
    public function dashboard(){
    	return view('user.dashboard');
    }

    public function comments(){
    	return view('user.comments');
    }

    public function profile(){
    	return view('user.profile');
    }

    public function profilePost(Request $request){
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        return back();
    }
}
