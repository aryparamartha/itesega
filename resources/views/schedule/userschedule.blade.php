@extends('layouts.dashboard_layout')

@section('pagetitle')
	<b><i class="fas fa-calendar-alt"></i> Jadwal</b>
@endsection

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="alert alert-success" role="alert">
				Tempat pertandingan: <b>Kampus TI</b>
			</div>

			<div class="table-responsive">
				<table class="table table-striped table-sm">
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