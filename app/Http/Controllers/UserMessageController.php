<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminMessage;
use App\UserMessage;
use DB;

class UserMessageController extends Controller
{
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = AdminMessage::where('view', '=', 0)->get();
        $allMessage = AdminMessage::orderBy('id', 'desc')->get();
        return view('messages.usermessagein', compact('message', 'allMessage'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function msgOut()
    {
        $message = AdminMessage::where('view', '=', 0)->get();
        $userMessage = UserMessage::where('view', 0)->get();
        return view('messages.usermessageout', compact('message', 'userMessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentMessage = AdminMessage::find($id);
        $message = UserMessage::where('view', '=', 0)->get();
        $currentMessage->view = 1;
        $currentMessage->save();
        return redirect('messages.showmessage', compact('message', 'currentMessage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
