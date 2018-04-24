
@extends('layouts.dashboard_layout')

@section('active2')
	active
@endsection

@section('pagetitle')
	<b><i class="fas fa-calendar-alt"></i> Dashboard</b>
@endsection
@section('content')
	<div class="card mb-4 elevation">
		<div class="card-body">
			@if(count($location))
				@foreach($location as $l)
					<div class="alert alert-success" role="alert">
						<h5><i class="fas fa-map-marker-alt"></i> Lokasi pertandingan: <b>{{$l->location}}</b></h5>
					</div>
				@endforeach
			@else
				<div class="alert alert-warning" role="alert">
					<i class="fas fa-map-marker-alt"></i> Tempat pertandingan belum ditentukan</b>
				</div>
			@endif

			<div class="table-responsive">
				<table id="datatables" class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Waktu</th>
							<th scope="col">Pertandingan</th>
						</tr>
					</thead>
					<tbody>
						@if(count($schedule))
							@foreach($schedule as $s)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{date('d F Y', strtotime($s->date))}}</td>
									<td>{{date('h:i', strtotime($s->time))}}</td>
									<td>{{$s->team1}} vs {{$s->team2}}</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="4"><center>Tidak ada jadwal</center></td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection