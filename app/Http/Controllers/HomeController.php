<?php namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){	
    	return 'hello world';
	}
	
	public function login(){	
    	return view('login');
	}
}