<?php 
namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Requests\AddEmployee;
use App\Http\Requests\EditEmployee;
use App\Http\Controllers\Controller;
use Validator, Input, Redirect, Hash, Request;

class HomeController extends Controller
{
	public function login(){	
    	return view('login');
	}
	public function dashboard(){	
    	return view('index');
	}
	public function add(){	
    	return view('add');
	}
	public function employees(){

		$users = User::all();


		return view('employees', ['users' => $users]);
	}
	public function AddEmployee(AddEmployee $request){

		$input = $request->all();

		$password = str_random(8);

		$input['password'] = Hash::make($password);

		User::create($input);

		return redirect('employees');

	}
	public function employee($id){

		$user = User::findOrFail($id);

		return view('editemployee', ['user' => $user]);
	}
	public function EditEmployee($id, EditEmployee $request){

		$user = User::findOrFail($id);

		$user->update($request->all());

		return redirect('employees');
	}
}