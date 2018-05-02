<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\UserMessage;
use App\AdminMessage;
use App\GuestMessage;
use Session;
use Validator;

class MessageController extends Controller
{
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
    public function index()
    {
        $message = UserMessage::where('view', '=', 0)->get();
        $allMessage = UserMessage::orderBy('id', 'desc')->get();
        return view('messages.messagein', compact('readMessage', 'message', 'allMessage'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function msgGuestIndex()
    {
        $message = UserMessage::where('view', '=', 0)->get();
        $allMessage = GuestMessage::orderBy('id', 'desc')->get();
        return view('messages.messageinguest', compact('message', 'allMessage'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function msgOut()
    {
        $message = UserMessage::where('view', '=', 0)->get();
        $adminMessage = AdminMessage::orderBy('id', 'desc')->get();
        return view('messages.messageout', compact('message', 'adminMessage'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function msgGuestShow($id)
    {
        $currentMessage = GuestMessage::find($id);
        $message = UserMessage::where('view', '=', 0)->get();
        $currentMessage->view = 1;
        $currentMessage->save();
        return view('messages.showmessageinguest', compact('message', 'currentMessage'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ],[
            'name.required' => 'Kolom nama harus diisi',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'email' => 'Email tidak boleh lebih dari 255 karakter',
            'message.required' => 'Pesan harus diisi',
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Pesan gagal dikirim');
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
        $message = new UserMessage;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        Session::flash('success', 'Pesan berhasil dikirim');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentMessage = UserMessage::find($id);
        $message = UserMessage::where('view', '=', 0)->get();
        $currentMessage->view = 1;
        $currentMessage->save();
        return view('messages.showmessagein', compact('message', 'currentMessage'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function viewMsgOut($id)
    {
        $currentMessage = AdminMessage::find($id);
        $message = UserMessage::where('view', '=', 0)->get();
        return view('messages.showmessagein', compact('message', 'currentMessage'));

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
        $message = UserMessage::find($id);
        $message->view = 1;
        $message->save();
        return redirect('/admin/message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = UserMessage::find($id);
        if ($message) {
            $message->delete();
        }
        Session::flash('success', 'Pesan berhasil dihapus');
        return redirect('/admin/message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteGuestMsg($id)
    {
        $message = GuestMessage::find($id);
        if ($message) {
            $message->delete();
        }
        Session::flash('success', 'Pesan berhasil dihapus');
        return redirect('/admin/message-guest');
    }
}
