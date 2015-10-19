<?php namespace App\Http\Controllers;

class HomeController extends Controller
{
	public function login(){	
    	return view('login');
	}
	public function add(){	
    	return view('add');
	}
	public function index(){	
    	return view('index');
	}
}