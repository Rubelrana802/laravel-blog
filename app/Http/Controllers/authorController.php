<?php

namespace App\Http\Controllers;
use App\comment;
use Illuminate\Http\Request;

class authorController extends Controller
{
	public function __construct(){
		$this->middleware('checkRole:author');
	}

    public function dashboard(){
    	return view('author.dashboard');
    }

    public function comments(){
    	return view('author.comments');
    } 

    public function posts(){
    	return view('author.posts');
    }

}
