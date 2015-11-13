<?php
namespace App\Http\Controllers;

use App\Division;
use App\User;
use App\News;
use App\Http\Requests;
use App\Http\Requests\AddDivision;
use App\Http\Requests\EditDivision;
use App\Http\Requests\AddEmployee;
use App\Http\Requests\EditEmployee;
use App\Http\Requests\AddNieuws;
use App\Http\Controllers\Controller;
use Validator, Input, Redirect, Hash, Request, Auth, Mail;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function dashboard()
	{
		$news = News::all();
    	return view('dashboard', ['news' => $news]);
	}

	public function getAddNieuws(){
		return view('addnieuws');
	}

	public function getAddEmployee()
	{
    	return view('add');
	}

	public function employees()
	{
		$users = User::all();
			return view('employees', ['users' => $users]);
	}

	public function postAddEmployee(AddEmployee $request)
	{
		$input = $request->all();
		$password = str_random(8);
		$input['password'] = bcrypt($password);
		User::create($input);
			return redirect('medewerkers');
	}

	public function getEditEmployee($id)
	{
		$user = User::findOrFail($id);
			return view('editemployee', ['user' => $user]);
	}

	public function postEditEmployee($id, EditEmployee $request)
	{
		$user = User::findOrFail($id);
		$user->update($request->all());
			return redirect('medewerkers');
	}

 	public function getDeleteEmployee($id)
	{
		$user = User::findOrFail($id);
  		return view('deleteEmployee', ['user' => $user]);
 	}

 	public function postDeleteEmployee($id)
	{
		$user = User::findOrFail($id);
		$user->delete(User::all());
  		return redirect('medewerkers');
 	}

	public function divisions()
	{
		$division = Division::all();
			return view('divisions', ['division' => $division]);
	}

	public function getAddDivision()
	{
  		return view('addDivision');
 	}

 	public function postAddDivision(AddDivision $request)
	{
		$input = $request->all();
		Division::create($input);
			return redirect('afdelingen');
 	}

	public function getEditDivision($id)
	{
		$division = Division::findOrFail($id);
			return view('editdivision', ['division' => $division]);
 	}

 	public function postEditDivision($id, EditDivision $request)
	{
		$division = Division::findOrFail($id);
		$division->update($request->all());
			return redirect('afdelingen');
 	}

 	public function getDeleteDivision($id)
	{
		$division = Division::findOrFail($id);
			return view('deletedivision', ['division' => $division]);
 	}

 	public function postDeleteDivision($id)
	{
		$division = Division::findOrFail($id);
		$division->delete(Division::all());
			return redirect('afdelingen');
 	}

 	public function postAddNieuws(AddNieuws $request)
 	{
 		$input = $request->all();
		News::create($input);
			return redirect('nieuws');
 	}
}









