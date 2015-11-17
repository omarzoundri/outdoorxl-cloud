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
use App\Http\Requests\AddAvailability;
use App\Http\Requests\AddNieuws;
use App\Http\Requests\EditNieuws;
use App\Http\Controllers\Controller;
use Validator, Input, Redirect, Hash, Request, Auth, Mail;
use Jenssegers\Date\Date;

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
	public function getNieuws($id){
		$news = News::findOrFail($id);
		return view('nieuws', compact('news'));
	}
	public function getAddNieuws(){
		return view('addnieuws');
	}
 	public function postAddNieuws(AddNieuws $request)
 	{
 		$input = $request->all();
		News::create($input);
		return redirect('nieuws');
 	}
	public function getEditNieuws($id){
		$news = News::findOrFail($id);
		return view('editnieuws', compact('news'));
	}
	public function postEditNieuws($id, EditNieuws $request){
		$news = News::findOrFail($id);
		$news->update($request->all());
		return redirect('nieuws');
	}
	public function getDeleteNieuws($id){
		$news = News::findOrFail($id);
		return view('deletenieuws', compact('news'));
	}
	public function postDeleteNieuws($id, DeleteNieuws $request){
		$news = News::findOrFail($id);
		$news->delete(News::all());
		return redirect('nieuws');
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
  		return view('delete-employee', ['user' => $user]);
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
  		return view('add-division');
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
 	public function getAvailability()
 	{

 		Date::setLocale('nl');
 		return view('availability');
 	}
 	public function postAvailability(AddAvailability $request)
 	{
 		return $request->from;
 	}
 	public function getScheduleEmployee()
 	{
 		return view('schedule-employee');
 	}
 	public function postScheduleEmployee()
 	{
 		return redirect('schedule-employee');
 	}
 	public function getEditSchedule()
 	{
 		return view('editschedule');
 	}
 	public function postEditSchedule()
 	{
 		return redirect('editschedule');
 	}
}
