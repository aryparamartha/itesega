@extends('layouts.admin_layout')

@section('pagetitle')
	<b><i class="fas fa-home"></i> Dashboard Admin</b>
@endsection

@section('content')

	<h3>Daftar Tim</h3>

	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<th>#</th>
				<th>Nama Tim</th>
			</thead>
			<tbody>
				@if(count($team))
					@foreach($team as $t)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$t->teamname}}</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="2">Tidak ada tim</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>

@endsection