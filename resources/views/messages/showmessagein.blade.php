@extends('layouts.admin_layout')

@section('active5')
    active
@endsection

@section('pagetitle')
<b><i class="fas fa-comments"></i> Pesan Masuk</b>
@endsection

@section('content')
    <div class="card mb-4 elevation">
        <div class="card-body">
            <a href="/admin/message" style="color:black"><h3><i class="fas fa-arrow-left"></i></h3></a>

            <h3 class="mb-1">{{$currentMessage->subject}}</h3>
            <hr style="border-bottom:1px solid #E5E5E5">
            Diterima: {{date('d F Y', strtotime($currentMessage->created_at))}} pukul: {{date('H:i', strtotime($currentMessage->created_at))}} ({{$currentMessage->created_at->diffForHumans()}})
            <p>Dari: <b>{{$currentMessage->name}}</b> | {{$currentMessage->email}}</p>
            <p>Pesan:<br>{{$currentMessage->message}}</p>
        </div>
    </div>
@endsection