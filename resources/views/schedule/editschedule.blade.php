@extends('layouts.admin_layout')

@section('pagetitle')
	<b><i class="fas fa-edit"></i> Edit Jadwal</b>
@endsection

@section('content')
<div class="col-md-5">
	<div class="card">
		<div class="card-body">
			<form class="form-group" method="POST" action="/admin/jadwal/{{$schedule->id}}">

				@csrf
				{{method_field('PUT')}}

				<div class="mb-2">
					<label for="date">Tanggal</label>
					<input id="date" type="date" name="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" value="{{$schedule->date}}" required autofocus>
					@if ($errors->has('date'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('date') }}</strong>
	                </span>
	            @endif
				</div>

				<div class="mb-2">
					<label for="time">Waktu</label>
					<input id="time" type="time" name="time" class="form-control" value="{{$schedule->time}}" required>
					@if ($errors->has('time'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('time') }}</strong>
	                </span>
	            @endif
				</div>

				<div class="mb-2">
					<label for="match">Pertandingan</label>
					<input id="match" type="text" name="match" class="form-control" value="{{$schedule->match}}" required>
					@if ($errors->has('match'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('match') }}</strong>
	                </span>
	            @endif
				</div>

				<button type="submit" name="submit" value="Simpan" class="btn btn-primary mt-3" required><i class="far fa-save"></i> Simpan</button>
				<a class="btn btn-secondary mt-3 ml-2" href="{{ route('jadwal.index') }}"><i class="fas fa-times"></i> Batal</a>
			</form>
		</div>
	</div>
</div>
@endsection