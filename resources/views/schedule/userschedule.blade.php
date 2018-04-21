@extends('layouts.dashboard_layout')

@section('pagetitle')
	<b><i class="fas fa-calendar-alt"></i> Jadwal</b>
@endsection

@section('content')
	<div class="card">
		<div class="card-body">
			@if(count($location))
				@foreach($location as $l)
					<div class="alert alert-success" role="alert">
						<i class="fas fa-map-marker-alt"></i> Tempat pertandingan: <b>{{$l->location}}</b>
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