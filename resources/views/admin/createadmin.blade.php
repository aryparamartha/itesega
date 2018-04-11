@extends('layouts.admin_layout')

@section('pagetitle')
	<b> Buat Akun Admin</b>
@endsection

@section('content')
	<div class="col-md-5 px-0">
		<form class="form-group" action="{{route('admin.store')}}" method="POST">

			@csrf
			<div class="row mb-2">
				<label class="col-md-4 col-form-label" for="username">Nama Lengkap</label>
				<input id="username" type="text" name="username" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" required autofocus>
				@if ($errors->has('username'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('username') }}</strong>
	                </span>
	            @endif
	        </div>

	        <div class="row mb-2">
				<label class="col-md-4 col-form-label" for="email">Email</label>
				<input id="email" type="text" name="email" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
				@if ($errors->has('email'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	            @endif
	        </div>

			<div class="row mb-2">
                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                <input id="password" type="password" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mb-2">
                <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" style="margin-left: 15px" class="col-md-7 form-control" name="password_confirmation" required>
            </div>

			<input type="submit" name="submit" value="Simpan" class="btn btn-primary mt-3" required>
			<a class="btn btn-secondary mt-3 ml-2" href="/tim">Batal</a>
		</form>
	</div>
@endsection