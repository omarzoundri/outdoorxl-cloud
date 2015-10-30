<?php 
namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Requests\AddEmployee;
use App\Http\Requests\EditEmployee;
use App\Http\Controllers\Controller;
use Validator, Input, Redirect, Hash, Request, Auth, Mail;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function login()
	{	
    	return view('login');
	}
	public function dashboard()
	{	
    	return view('dashboard');
	}
	public function add()
	{	
    	return view('add');
	}
	public function employees()
	{
		$users = User::all();

		return view('employees', ['users' => $users]);
	}
	public function AddEmployee(AddEmployee $request)
	{
		$input = $request->all();
		$password = str_random(8);
		$input['password'] = bcrypt($password);
		User::create($input);

		return redirect('employees');
	}
	public function employee($id)
	{
		$user = User::findOrFail($id);

		return view('editemployee', ['user' => $user]);
	}
	public function EditEmployee($id, EditEmployee $request)
	{
		$user = User::findOrFail($id);
		$user->update($request->all());

		return redirect('employees');
	}
	 public function AddAfdeling(){
  		// $input = $request->all();
  		// Division::create($input);
  		return view('addafdeling');
 	}
}