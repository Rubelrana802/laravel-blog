<?php

namespace App\Http\Controllers;

use DB;
use App\post;
use App\comment;
use Illuminate\Http\Request;

class publicController extends Controller
{
    public function index(){
        $posts = post::all();
    	return view('welcome', compact('posts'));

    }

    public function singlePost($id){
        $post = post::find($id);
        $comments = DB::table('comments')
                    ->where('id', $id)
                    ->get();
         	return view('singlePost', get_defined_vars());
    }

    public function about(){
    	return view('about');
    }
    

    public function contact(){
    	return view('contact');
    }
    

    public function contactPost(){
    	return view('contact');
    }
    
}
