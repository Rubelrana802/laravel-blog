<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\comment;
use Illuminate\Http\Request;

class adminController extends Controller
{
	public function __construct(){
		$this->middleware('checkRole:admin');
	}

    public function dashboard(){
    	return view('admin.dashboard');
    }

    public function comments(){
    	return view('admin.comments', compact('comment'));
    } 

    public function posts(){
    	return view('admin.posts');
    }

    public function users(){
    	return view('admin.users');
    }
}
