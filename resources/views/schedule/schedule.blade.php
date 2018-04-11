@extends('layouts.admin_layout')

@section('pagetitle')
	<b><i class="fas fa-calendar-alt"></i> Jadwal</b>
@endsection

@section('content')

	<a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Jadwal</a>

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
							<th scope="col">Aksi</th>
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
									<td>
										<a href="/admin/jadwal/{{$s->id}}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
										<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i> Hapus</button>
										<!-- Modal -->
										<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
											  		<div class="modal-header">
											    		<h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
										    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											      			<span aria-hidden="true">&times;</span>
											    		</button>
									  				</div>
									  				<div class="modal-body">
											    		<p>Apakah Anda yakin menghapus jadwal pertandingan <b>{{$s->team1}} vs {{$s->team2}}</b></p>
											  		</div>
											  		<div class="modal-footer">
												    	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
												    	<form class="form group" action="/admin/jadwal/{{$s->id}}" method="POST">
									                        @csrf
									                        {{method_field('DELETE')}}
									                        <button style="border-radius: 0px" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
									                    </form>
									                </div>
									            </div>
									        </div>
									    </div>
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="5"><center>Tidak ada jadwal</center></td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection