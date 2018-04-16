<?php

namespace App\Http\Controllers;

use App\Member;
use Auth;
use Image;
use File;
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

		if($request->hasFile('avatar')){
			$avatar = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->save( public_path('/avatars/' . $filename ) );
			$member->avatar= $filename;
		}

		$member->save();

		return redirect('/team');
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
		
		if($request->hasFile('avatar')){
			if ($member->avatar != "default.jpg") {
				$oldFileName= $member->avatar;
				File::delete(public_path('/avatars/'. $oldFileName) );
			}

    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->save( public_path('/avatars/' . $filename ) );
			$member->avatar = $filename;
        }

		$member->save();
		return redirect('/team');
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
			$oldFileName= $member->avatar;
			File::delete(public_path('/avatars/'. $oldFileName) );
		}

		return redirect('/team');
	}
}
