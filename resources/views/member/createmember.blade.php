@extends('layouts.dashboard_layout')

@section('pagetitle')
	<b><i class="fas fa-plus"></i> Tambah anggota</b>
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
		<form class="form-group" action="{{route('anggota.store')}}" method="POST">

			@csrf

			<div class="row">
				<label class="col-md-4" for="name">Nama Lengkap</label>
				<input id="name" type="text" name="name" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('name') ? ' is-invalid' : '' }} mb-2" required autofocus>
				@if ($errors->has('name'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('name') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="steamid">ID Steam</label>
				<input id="steamid" type="text" name="steamid" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('steamid') ? ' is-invalid' : '' }} mb-2" required>
				@if ($errors->has('steamid'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('steamid') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="email">Email</label>
				<input id="email" type="text" name="email" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('email') ? ' is-invalid' : '' }} mb-2" required>
				@if ($errors->has('email'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="phonenumber">Nomor HP</label>
				<input id="phonenumber" type="text" name="phonenumber" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }} mb-2" required>
				@if ($errors->has('phonenumber'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('phonenumber') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="address">Alamat</label>
				<textarea id="address" name="address" style="margin-left: 15px" class="col-md-7 form-control mb-2" required></textarea>
			</div>

			<button type="submit" name="submit" value="Simpan" class="btn btn-primary mt-3" required><i class="far fa-save"></i> Simpan</button>
			<a class="btn btn-secondary mt-3 ml-2" href="/tim"><i class="fas fa-times"></i> Batal</a>
		</form>
	</div>

@endsection