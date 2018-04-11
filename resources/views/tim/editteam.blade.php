@extends('layouts.dashboard_layout')

@section('pagetitle')
	<b>Edit Team</b>
@endsection

@section('content')
	<div class="row border-bottom mb-3" style="margin-left: 2px">
		<img class="mb-3" height="100px" width="100px" src="{{ asset('img/apple-touch-icon.png') }}">
		<div class="ml-3">
			<h5>Tim: <b>{{ Auth::user()->teamname }}</b></h5>
			<p>Deskripsi: <b>{{ Auth::user()->description }}</b></p>
			<p>Dibuat pada tanggal: <b>{{date('d F Y', strtotime(Auth::user()->created_at))}}</b></p>
		</div>
	</div>

	<div class="col-md-5 px-0">
		<form class="form-group mb-5" action="/tim/{{Auth::user()->id}}" method="POST">
			@csrf
			{{method_field('PUT')}}

			<div class="row">
				<label class="col-md-4" for="name">Username</label>
				<input id="name" type="text" name="name" value="{{Auth::user()->name}}" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('name') ? ' is-invalid' : '' }} mb-2" required autofocus>
				@if ($errors->has('name'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('name') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="teamname">Nama Tim</label>
				<input id="teamname" type="text" name="teamname" value="{{Auth::user()->teamname}}" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('teamname') ? ' is-invalid' : '' }} mb-2" required autofocus>
				@if ($errors->has('teamname'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('teamname') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="description">Deskripsi</label>
				<input id="description" type="text" name="description" value="{{Auth::user()->description}}" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('description') ? ' is-invalid' : '' }} mb-2" required autofocus>
				@if ($errors->has('description'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('description') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="email">Email</label>
				<input id="email" type="text" name="email" value="{{Auth::user()->email}}" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('email') ? ' is-invalid' : '' }} mb-2" required>
				@if ($errors->has('email'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="phonenumber">Phonenumber</label>
				<input id="phonenumber" type="text" name="phonenumber" value="{{Auth::user()->phonenumber}}" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }} mb-2" required>
				@if ($errors->has('phonenumber'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('phonenumber') }}</strong>
	                </span>
	            @endif
	        </div>

			<input type="submit" name="submit" class="btn btn-primary mr-2 mt-3" value="Simpan" required>
			<a class="btn btn-secondary mt-3" href="/tim">Batal</a>
		</form>
	</div>

@endsection