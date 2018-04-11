<?php

namespace App\Http\Controllers;

use App\Member;
use Auth;
use Illuminate\Http\Request;

class MemberController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('member.createmember');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$member = new Member;
		$member->name = $request->name;
		$member->steamid = $request->steamid;
		$member->email = $request->email;
		$member->phonenumber = $request->phonenumber;
		$member->address = $request->address;
		$member->teamid = Auth::user()->id;

		$member->save();

		return redirect('/tim');
	}

	/**
	 * Display the specified resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$member = Member::find($id);
		return view('member.editmember', compact('member'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$member = Member::find($id);
		$member->name = $request->name;
		$member->steamid = $request->steamid;
		$member->email = $request->email;
		$member->phonenumber = $request->phonenumber;
		$member->address = $request->address;
		$member->save();
		return redirect('/tim');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$member = Member::find($id);
		if ($member) {
			$member->delete();
		}

		return redirect('/tim');
	}
}
