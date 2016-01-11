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
	public function getEditProfile(){
		$user = Auth::user();
		return view('editprofile', compact('user'));
	}
	public function postEditProfile(EditProfile $request){

		$user = Auth::user();
		if ($request->email != null){
			$user->email = $request->email;
			$user->save();
		}
		if (Hash::check($request->oldpassword, $user->password)) {
			if($request->confirmpassword == $request->newpassword && $request->newpassword != null){
				$user->password = $request->newpassword;
				$user->save();
			}
		}

		return view('editprofile', compact('user', 'email'));
	}
	public function dashboard()
	{
		$news = DB::table('news')
                ->orderBy('created_at', 'desc')
                ->get();
    	return view('dashboard', ['news' => $news]);
	}

	public function viewRoster()
	{
		$users = User::where('id', '=', Auth::user()->id)->get();
		$planning = Planning::where('status', '=', 2)
					->get();
		$monday = Carbon::now()->startofweek();

        return view('myschedule', ['planning' => $planning, 'monday' => $monday, 'users' => $users]);
	}
	public function getAddNews()
	{
		return view('addnieuws');
	}

 	public function postAddNews(AddNieuws $request)
 	{
 		$input = $request->all();
		News::create($input);
		return redirect('nieuws');
 	}
	public function getEditNews($id){
		$news = News::findOrFail($id);
		return view('editnieuws', compact('news'));
	}
	public function postEditNews($id, EditNieuws $request){
		$news = News::findOrFail($id);
		$news->update($request->all());
		return redirect('nieuws');
	}
	public function getDeleteNews($id){
		$news = News::findOrFail($id);
		return view('deletenieuws', compact('news'));
	}
	public function postDeleteNews($id){
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
		$divisions = Division::all();

    	return view('addemployee', ['divisions' => $divisions]);
	}

	public function postAddEmployee(AddEmployee $request)
	{
		$input = $request->all();
		$password = str_random(8);
		$input['password'] = bcrypt($password);
		User::create($input);
		$division = Division::where('division_id', '=', $request->division_id)
							->get();
							
		Mail::send('emails.created', ['request' => $request, 'password' => $password, 'division' => $division], function ($m) use ($request, $password, $division) {
            $m->from('info@outdoorxl.nl', 'OutdoorXL');

            $m->to($request->email, $request->name)->subject('Welkom, beste medewerker van OutdoorXL!');
        });

		return redirect('medewerkers');
	}

	public function getEditEmployee($id)
	{
		$user = User::findOrFail($id);
		$currentdivision = Division::where('division_id', '=', $user->division_id)
							->get();
		$divisions = Division::all();

		return view('editemployee', ['user' => $user, 'divisions' => $divisions, 'currentdivision' => $currentdivision]);
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
			if ($request->datename === "maandag" || $request->datename === "dinsdag" || $request->datename === "woensdag" || $request->datename === "donderdag" || $request->datename === "zaterdag") {
				$request->start = 10;
				$request->end = 18;
			}
			if ($request->datename === "vrijdag") {
				$request->start = 10;
				$request->end = 21;
			}
			if($request->datename === "zondag") {
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
				if ($request->datename === "maandag" || $request->datename === "dinsdag" || $request->datename === "woensdag" || $request->datename === "donderdag" || $request->datename === "zaterdag") {
					$planning->from = 10;
					$planning->untill = 18;
				}
				if ($request->datename === "vrijdag") {
					$planning->from = 10;
					$planning->untill = 21;
				}
				if($request->datename === "zondag") {
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

 	public function getAddHoursEmployee()
 	{
 		$status = DB::table('planning')
            ->where('status', 3)
            ->get();
        $error = false;

        foreach ($status as $stat) {
        	if ($stat->user_id == Auth::user()->id) {
        		
        		$error = 'Jij hebt je uren al ingevuld voor vandaag.';

        	}
        }
 		return view('dailyhours',['error' => $error] );
 	}

 	public function postAddHoursEmployee(Request $request)
 	{
 		$planning = new Planning;
		$planning->user_id = Auth::user()->id;
		$planning->date = Carbon::today()->format('Y-m-d');

		$planning->from = $request->start;
		$planning->break = $request->pauze;
		$planning->untill = $request->end;	
		$planning->status = 3;

		$planning->save();

		return redirect('myschedule');
 	}

 	public function getDailyHours(){

 		$users = User::all();
 		$divisions = Division::all();
 		$monday = Carbon::now()->startofweek();
 		$planning = Planning::where('date', '=', Carbon::today())
 			->where('status', '=', 3)
 			->get();

		return view('schedule-dailyhours', ['users' => $users, 'divisions' => $divisions, 'planning' => $planning, 'monday' => $monday]);
 	}

 	public function postDailyHours(Request $request){

 		$planning_id = $request->_planningid;
 		$status = 4;

 		DB::table('planning')
            ->where('planning_id', $planning_id)
            ->update(['status' => $status]);


 		return '{"result":"'.$status.'"}';
 	}

 	public function getDailyRoster(){
		$users = User::all();
 		$divisions = Division::all();
   		$monday = Carbon::now()->startofweek();
   		$planning = Planning::where('date', '=', Carbon::today())
       		->where('status', '=', 2)
       		->get();



  		return view('dailyroster', ['users' => $users, 'divisions' => $divisions, 'planning' => $planning, 'monday' => $monday]); 
 	}
 	public function getEditDailyHours($planningid){

 		$planning = Planning::where('planning_id', '=', $planningid)
				->get();

		return view('edit-daily-hours', ['planning' => $planning]);

 	}
 	public function postEditDailyHours(Request $request ,$planningid){

 		DB::table('planning')
	            ->where('planning_id', $planningid)
	            ->update([
	            	'from' => $request->start,
	             	'untill' => $request->end,
	             	'break' => $request->break,
	             ]);

 		return redirect('dagelijkseuren-bevestigen');
 		
 	}
 	public function getDailyReminder(){

 		return view('daily-reminder');
 	}
}
