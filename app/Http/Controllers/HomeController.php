<?php
namespace App\Http\Controllers;

use App\Division, App\Planning, App\News, App\User;
use App\Http\Requests\EditNieuws, App\Http\Requests\AddNieuws, App\Http\Requests, App\Http\Requests\AddDivision, App\Http\Requests\EditProfile;
use App\Http\Requests\EditDivision, App\Http\Requests\AddEmployee, App\Http\Requests\EditEmployee;
use Illuminate\Http\Request;
use App\Http\Requests\AddAvailability, App\Http\Requests\PostSchedule;
use App\Http\Controllers\Controller;
use Validator, Input, Redirect, Hash, Auth, Mail;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		Date::setLocale('nl');
	}
	public function getEditProfile($id){
		$users = User::findOrFail($id);
		return view('editprofile', compact('users'));
	}
	public function postEditProfile($id, EditProfile $request){

		$users = User::findOrFail($id);
		$users->update($request->all());

		
		// 	DB::table('users')
		// 					->where('email', 'Auth::user()->email')
		// 					->value('email')
		// 					->update([
		// 						'email' => $request->email
		// 					]);

		/*
			if(bcrypt(Auth::user()->password) != $users->password){
				return "nope";
			} else {
					$users->update($request->password());
			}
			$input = $request->all();
			$password = bcrypt($request->oldpassword);
			if ($password == Auth::user()->password) {

				$input['password'] = Hash::make($input['password']);
				$users = User::find($id);
				$users->update($input);
				return redirect('dashboard');
			}*/
		return view('editprofile', compact('users', 'email'));
	}
	public function dashboard()
	{
		$news = DB::table('news')
                ->orderBy('created_at', 'desc')
                ->get();
    	return view('dashboard', ['news' => $news]);
	}

	public function viewRooster()
	{
		$users = User::where('id', '=', Auth::user()->id)->get();
		$planning = Planning::all();
		$monday = Carbon::now()->startofweek();
	
        return view('myschedule', ['planning' => $planning, 'monday' => $monday, 'users' => $users]);
	}
	public function getAddNieuws()
	{
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

		$planning = new Planning;
		$planning->user_id = Auth::user()->id;
		$planning->date = $request->datex;

		$planning->from = $request->start;
		$planning->untill = $request->end;

		if ($request->status == 1) {
			if ($request->datename === "Maandag" || $request->datename === "Dinsdag" || $request->datename === "Woensdag" || $request->datename === "Donderdag" || $request->datename === "Zaterdag") {
				$request->start = 10;
				$request->end = 18;
			}
			if ($request->datename === "Vrijdag") {
				$request->start = 10;
				$request->end = 21;
			}
			if($request->datename === "Zondag") {
				$request->start = 12;
				$request->end = 17;
			}
			DB::table('planning')
	            ->where('planning_id', $request->planningid)
	            ->update([
	            	'from' => $request->start,
	             	'untill' => $request->end,
	             	'unavailable' => $request->unavailable,
	             	'day' => $request->day
	             ]);
		}
		else{
			$planning = new Planning;
			$planning->user_id = Auth::user()->id;

			$planning->day = $request->day;
			$planning->unavailable = $request->unavailable;

			$planning->date = $request->datex;

			$planning->from = $request->start;
			$planning->untill = $request->end;

			if ($request->day == 1){
				if ($request->datename === "Maandag" || $request->datename === "Dinsdag" || $request->datename === "Woensdag" || $request->datename === "Donderdag" || $request->datename === "Zaterdag") {
					$planning->from = 10;
					$planning->untill = 18;
				}
				if ($request->datename === "Vrijdag") {
					$planning->from = 10;
					$planning->untill = 21;
				}
				if($request->datename === "Zondag") {
					$planning->from = 12;
					$planning->untill = 16.30;
				}
			}
			$planning->save();
		}
 		
 		return response()->json(['status' => 1]);
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

 	public function postScheduleEmployee(Request $request)
 	{
 		//Ophalen aangeklikte id
 		$planning_id = $request->_planningid;
 		//Ophalen aangespaste status van aangeklikte id
 		$status = $request->_status;

 		//Updaten van tabel
 		DB::table('planning')
            ->where('planning_id', $planning_id)
            ->update(['status' => $status]);

        //Terug geven json resultaat
 		return '{"result":"'.$status.'"}';
 	}

 	public function getAddUrenMedewerker()
 	{
 		return view('dailyhours');
 	}

 	public function postAddUrenMedewerker()
 	{
 		
 	}
}









