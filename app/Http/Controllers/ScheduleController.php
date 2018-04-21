<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\User;
use DB;
use Validator;
use Session;
use App\MatchLocation;
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
		$team = User::all();
		$location = MatchLocation::all();
		$schedule = DB::table('schedules')->join('users as team1', 'team1.id', '=', 'schedules.teamid1')
			->join('users as team2', 'team2.id', '=', 'schedules.teamid2')
			->select('schedules.*', 'team1.teamname as team1', 'team2.teamname as team2')
			->orderBy('id', 'asc')
			->get();

		// select from schedules
		// join users as team1 on team1.id = schedules.teamid1
		// join users as team2 on team2.id = schedules.teamid2

		return view('schedule.schedule', compact('schedule', 'team', 'location'));
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
		$validator = Validator::make($request->all(), [
			'date' => 'required|date',
			'time' => 'required',
			'teamid1' => 'required',
			'teamid2' => 'required',
		],[
			'date.required' => 'Tanggal harus ditentukan',
			'time.required' => 'Waktu harus ditentukan',
		]);

		if ($validator->fails()) {
			Session::flash('error', 'Jadwal berhasil dibuat');
            return redirect('/team')
                        ->withErrors($validator)
                        ->withInput();
        }
		
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
		$validator = Validator::make($request->all(), [
			'date' => 'required|date',
			'time' => 'required',
			'teamid1' => 'required',
			'teamid2' => 'required',
		],[
			'date.required' => 'Tanggal harus ditentukan',
			'time.required' => 'Waktu harus ditentukan',
		]);
		if ($validator->fails()) {
			Session::flash('error', 'Schedule gagal dibuat');
            return redirect('/admin/jadwal')
                        ->withErrors($validator)
                        ->withInput();
        }

		$schedule = Schedule::find($id);
		$schedule->date = $request->date;
		$schedule->time = $request->time;
		$schedule->teamid1 = $request->teamid1;
		$schedule->teamid2 = $request->teamid2;
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function storeLocation(Request $request) {
		$validator = Validator::make($request->all(), [
			'location' => 'required',
		],[
			'location.required' => 'Lokasi gagal ditentukan',
		]);
		if ($validator->fails()) {
			Session::flash('error', 'Lokasi gagal dibuat');
            return redirect('/admin/jadwal')
                        ->withErrors($validator)
                        ->withInput();
        }

		$schedule = new MatchLocation;
		$schedule->location = $request->location;
		$schedule->save();

		return redirect('/admin/jadwal');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function updateLocation(Request $request, $id) {
		$validator = Validator::make($request->all(), [
			'location' => 'required',
		],[
			'location.required' => 'Lokasi pertadingan harus ditentukan',
		]);
		if ($validator->fails()) {
			Session::flash('error', 'Lokasi gagal dibuat');
            return redirect('/admin/jadwal')
                        ->withErrors($validator)
                        ->withInput();
        }

		$schedule = MatchLocation::find($id);
		$schedule->location = $request->location;
		$schedule->save();

		return redirect('/admin/jadwal');
	}
}
