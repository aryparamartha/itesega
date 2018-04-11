<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\User;
use DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth:admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$schedule = DB::table('schedules')->join('users as team1', 'team1.id', '=', 'schedules.teamid1')
			->join('users as team2', 'team2.id', '=', 'schedules.teamid2')
			->select('schedules.*', 'team1.teamname as team1', 'team2.teamname as team2')
			->orderBy('id', 'asc')
			->get();

		// select from schedules
		// join users as team1 on team1.id = schedules.teamid1
		// join users as team2 on team2.id = schedules.teamid2

		return view('schedule.schedule', compact('schedule'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$team = User::all();
		return view('schedule.createschedule', compact('team'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$schedule = new Schedule;
		$schedule->date = $request->date;
		$schedule->time = $request->time;
		$schedule->teamid1 = $request->teamid1;
		$schedule->teamid2 = $request->teamid2;
		$schedule->save();

		return redirect('/admin/jadwal');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$team = User::all();
		$schedule = Schedule::find($id);
		return view('schedule.editschedule', compact('schedule'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$schedule = Schedule::find($id);
		$schedule->date = $request->date;
		$schedule->time = $request->time;
		$schedule->match = $request->match;
		$schedule->save();

		return redirect('/admin/jadwal');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$schedule = Schedule::find($id);
		$schedule->delete();
		return redirect('/admin/jadwal');
	}
}
