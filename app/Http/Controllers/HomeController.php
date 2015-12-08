<?php
namespace App\Http\Controllers;

use App\Division, App\Planning, App\News, App\User;
use App\Http\Requests\EditNieuws, App\Http\Requests\AddNieuws, App\Http\Requests, App\Http\Requests\AddDivision, App\Http\Requests\EditDivision, App\Http\Requests\AddEmployee, App\Http\Requests\EditEmployee, App\Http\Requests\AddAvailability;
use App\Http\Controllers\Controller;
use Validator, Input, Redirect, Hash, Request, Auth, Mail;
use Jenssegers\Date\Date;
use Carbon\Carbon;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		Date::setLocale('nl');
	}
	public function getEditProfile(){
		return view('editprofile');
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
	public function postDeleteNieuws($id){
		$news = News::findOrFail($id);
		$news->delete(News::all());
		return redirect('nieuws');
	}

	public function employees()
	{
		$users = User::all();
			return view('employees', ['users' => $users]);
	}

	public function getAddEmployee()
	{
    	return view('add');
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

		$planning = Planning::where('user_id', '=', Auth::user()->id)->get();
		$status = false;

 		return view('availability', ['planning' => $planning, 'status' => $status]);

 	}
 	public function postAvailability(AddAvailability $request)
 	{
 		for ($i=0; $i <= 27; $i++) {

 			$planning = new Planning;

			$planning->date = $request->date[$i];
			if (isset($request->day[$i])) {
				$planning->day = $request->day[$i];
			}
			if (isset($request->notavailable[$i])) {
				$planning->unavailable = $request->notavailable[$i];
			}
			$planning->from = $request->from[$i];
			$planning->untill = $request->untill[$i];
			$planning->user_id = Auth::user()->id;

			$planning->save();
 		}

 		return redirect('beschikbaarheid');
 	}

 	public function getScheduleEmployee()
 	{
 		$users = User::all();
 		$divisions = Division::all();
 		$monday = Carbon::now()->startofweek();
 		$planning = Planning::where('date', '>=', Carbon::now()->startofweek())
 						->where('date', '<=', Carbon::now()->startofweek()->addWeek())
 						->get();

		return view('schedule-employee', ['users' => $users, 'divisions' => $divisions, 'planning' => $planning, 'monday' => $monday]);
 	}

 	public function postScheduleEmployee()
 	{
 		return redirect('schedule-employee');
 	}

 	public function getEditSchedule()
 	{
 		$users = User::all();
 		$divisions = Division::all();
 		$planning = Planning::where('user_id', '=', Auth::user()->id)->get();

		return view('editschedule', ['users' => $users, 'divisions' => $divisions, 'planning' => $planning]);
 	}

 	public function postEditSchedule()
 	{
 		return redirect('editschedule');
 	}
}
