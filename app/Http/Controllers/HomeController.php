<?php namespace App\Http\Controllers;

class HomeController extends Controller
{
	public function login(){	
    	return view('login');
	}
	public function getAdd(){	
    	return view('add');
	}
	public function dashboard(){	
    	return view('index');
	}
}