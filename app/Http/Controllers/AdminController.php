<?php

namespace App\Http\Controllers;

use App\Admin;
use App\schedule;
use App\User;
use App\Member;
use Validator;
use Session;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller {
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
		return view('admin.admin', compact('team'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.createadmin');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:admins',
			'password' => 'required|string|min:6|confirmed'
		],[
			'name.required' => 'Kolom nama harus diisi',
			'name.max:255' => 'Nama tidak boleh lebih dari 255 karakter',
			'email.unique' => 'Email sudah digunakan',
			'email.max:255' => 'Email tidak boleh lebih dari 255 karakter',
			'password.required' => 'Password harus diisi',
		]);
		
		if ($validator->fails()) {
			Session::flash('error', 'Admin gagal ditambahkan');
            return redirect('/team')
                        ->withErrors($validator)
                        ->withInput();
        }

		$member = new Admin;
		$member->name = $request->name;
		$member->email = $request->email;
		$member->password = Hash::make($request->password);
		$member->save();

		return redirect('/admin/admin-account-list');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$member = Member::where('teamid', '=', $id)->get();
		return view('admin.adminshowmember', compact('member'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
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
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255',
			'password' => 'required|string|min:6|confirmed'
		],[
			'name.required' => 'Kolom nama harus diisi',
			'name.max:255' => 'Nama tidak boleh lebih dari 255 karakter',
			'email.max:255' => 'Email tidak boleh lebih dari 255 karakter',
			'email.required' => 'Kolom Email harus diisi',
			'password.required' => 'Password harus diisi',
		]);
		
		if ($validator->fails()) {
			Session::flash('error', 'Admin gagal diubah');
            return redirect('/team')
                        ->withErrors($validator)
                        ->withInput();
        }

		$admin = Admin::find($id);
		$admin->name = $request->name;
		$admin->email = $request->email;
		$admin->password = Hash::make($request->password);
		$admin->save();

		return redirect('/admin/admin-account-list');
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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function paymentConfirm(Request $request, $id) {
		$team = User::find($id);
		$team->confirmation = 1;
		$team->save();
		return redirect('/admin/home');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function paymentUnconfirm(Request $request, $id) {
		$team = User::find($id);
		$team->confirmation = 0;
		$team->save();
		return redirect('/admin/home');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function adminIndex() {
		$admin = Admin::all();
		return view('admin.adminaccount', compact('admin'));
	}
}
