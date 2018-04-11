@extends('layouts.admin_layout')

@section('pagetitle')
	<b><i class="fas fa-plus"></i> Buat Jadwal</b>
@endsection

@section('content')
<div class="col-md-5">
	<div class="card">
		<div class="card-body">
			<form class="form-group" method="POST" action="{{ route('jadwal.store') }}">

				@csrf

				<div class="mb-2">
					<label for="date">Tanggal</label>
					<input id="date" type="date" name="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" required autofocus>
					@if ($errors->has('date'))
		                <span class="invalid-feedback">
		                    <strong>{{ $errors->first('date') }}</strong>
		                </span>
		            @endif
				</div>

				<div class="mb-2">
					<label for="time">Waktu</label>
					<input id="time" type="time" name="time" class="form-control" required>
					@if ($errors->has('time'))
		                <span class="invalid-feedback">
		                    <strong>{{ $errors->first('time') }}</strong>
		                </span>
		            @endif
				</div>

				<label for="match">Pertandingan</label>
				<div class="row">
					<div class="col-md-5">
						<label for="teamid1">Tim 1</label>
						<select name="teamid1" class="custom-select">
							@foreach($team as $t)
								<option value="{{$t->id}}">{{$t->teamname}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-5">
						<label for="teamid2">Tim 2</label>
						<select name="teamid2" class="custom-select">
						  	@foreach($team as $t)
								<option value="{{$t->id}}">{{$t->teamname}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<button type="submit" name="submit" value="Simpan" class="btn btn-primary mt-3" required><i class="far fa-save"></i> Simpan</button>
				<a class="btn btn-secondary mt-3 ml-2" href="{{ route('jadwal.index') }}"><i class="fas fa-times"></i> Batal</a>
			</form>
		</div>
	</div>
</div>
@endsection