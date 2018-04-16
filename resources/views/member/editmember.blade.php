@extends('layouts.dashboard_layout')

@section('pagetitle')
	<b><i class="fas fa-edit"></i> Edit anggota</b>
@endsection

@section('content')
	<div class="col-md-5 px-0">
		<form enctype="multipart/form-data" class="form-group" action="/member/{{$member->id}}" method="POST">

			@csrf
			{{method_field('PUT')}}

			<div class="row">
				<label class="col-md-4" for="name">Nama Lengkap</label>
				<input id="name" type="text" name="name" value="{{$member->name}}" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('name') ? ' is-invalid' : '' }} mb-2" required autofocus>
				@if ($errors->has('name'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('name') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="steamid">ID Steam</label>
				<input id="steamid" type="text" name="steamid" value="{{$member->steamid}}" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('steamid') ? ' is-invalid' : '' }} mb-2" required>
				@if ($errors->has('steamid'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('steamid') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="email">Email</label>
				<input id="email" type="text" name="email" value="{{$member->email}}" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('email') ? ' is-invalid' : '' }} mb-2" required>
				@if ($errors->has('email'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="phonenumber">Nomor HP</label>
				<input id="phonenumber" type="text" name="phonenumber" value="{{$member->phonenumber}}" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }} mb-2" required>
				@if ($errors->has('phonenumber'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('phonenumber') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row">
				<label class="col-md-4" for="address">Alamat</label>
				<input id="address" type="text" name="address" value="{{$member->address}}" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('address') ? ' is-invalid' : '' }} mb-2" required>
				@if ($errors->has('address'))
					<span class="invalid-feedback">
						<strong>{{ $errors->first('address') }}</strong>
					</span>
				@endif
			</div>

			<div class="alert alert-warning" role="alert">
				Ukuran foto <span>tidak boleh</span> lebih dari 2 MB
			</div>

			<div class="row">							
				<label class="col-md-4" for="avatar">Foto profil</label>
				<input id="file" type="file" name="avatar" class="col-md-7">
			</div>

			<button type="submit" name="submit" value="Simpan" class="btn btn-primary mt-3" required><i class="far fa-save"></i> Simpan</button>
			<a class="btn btn-secondary mt-3 ml-2" href="/tim"><i class="fas fa-times"></i> Batal</a>
		</form>
	</div>

@endsection