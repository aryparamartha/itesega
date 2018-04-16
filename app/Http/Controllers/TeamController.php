<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Auth;
use Image;
use File;
use Illuminate\Http\Request;

class TeamController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$member = Member::where('teamid', Auth::user()->id)->get();
		return view('team.dashboard', compact('member'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
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
		$team = Auth::user()->$id;
		return view('team.editteam', compact('team'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$team = User::find(Auth::user()->id);
		$team->name = $request->name;
		$team->teamname = $request->teamname;
		$team->description = $request->description;
		$team->email = $request->email;
		$team->phonenumber = $request->phonenumber;

		if($request->hasFile('avatar')){
			if ($team->avatar != "default.jpg") {
				$oldFileName= $team->avatar;
				File::delete(public_path('/avatars/'. $oldFileName) );
			}

    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->save( public_path('/avatars/' . $filename ) );
    		$team->avatar = $filename;
        }

		$team->save();
		return redirect('/team');
	}

	public function updateAvatar(Request $request)
    {
        // Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->save( public_path('/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
        }
        return redirect('/team');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
