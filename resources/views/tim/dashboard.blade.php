@extends('layouts.dashboard_layout')

@section('pagetitle')
	<b><i class="fas fa-home"></i> Dashboard</b>
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

	<a class="btn btn-primary mb-3 btn-sm" href="{{route('anggota.create')}}"><i class="fas fa-plus"></i> Tambah anggota</a>

	<h5>Detail anggota</h5>
	<div class="table-responsive">
		<table class="table table-striped table-sm">
	  		<thead>
	    		<tr>
	      			<th>#</th>
	      			<th>Nama anggota</th>
	              	<th>ID Steam</th>
	              	<th>Email</th>
	              	<th>Nomor ponsel</th>
	              	<th>Alamat</th>
	              	<th>Aksi</th>
	    		</tr>
	  		</thead>
			<tbody>
				@if(count($member))
					@foreach($member as $m)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$m->name}}</td>
							<td>{{$m->steamid}}</td>
							<td>{{$m->email}}</td>
							<td>{{$m->phonenumber}}</td>
							<td>{{$m->address}}</td>
							<td>
								<a href="/anggota/{{$m->id}}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
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
									    		<p>Apakah Anda yakin menghapus <b>{{$m->name}}</b></p>
									  		</div>
									  		<div class="modal-footer">
										    	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
										    	<form class="form group" action="/anggota/{{$m->id}}" method="POST">
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
						<td colspan="7"><center>Tidak ada data</center></td>
					</tr>
				@endif
	        </tbody>
	    </table>
	</div>
@endsection