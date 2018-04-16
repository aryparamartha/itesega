@extends('layouts.dashboard_layout')

@section('pagetitle')
	<b><i class="fas fa-home"></i> Dashboard</b>
@endsection

@section('content')
	<div class="row justify-content-start border-bottom mb-3 pb-2" style="margin-left: 2px">
		<div class="col-md-4 p-0">
			<img style="" class="mb-2" height="auto" width="300px" src="/avatars/{{ Auth::user()->avatar}}"><br>
		</div>	

		<div class="col-md-8 p-0">
			<h5><b>Tim:</b> {{ Auth::user()->teamname }}</h5>
			<p><b>Deskripsi:</b> {{ Auth::user()->description }}</p>
			<p><b>pada tanggal:</b>{{date('d F Y', strtotime(Auth::user()->created_at))}}	</p>
			<button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#edit-team">
				<i class="fas fa-edit"></i> Perbaharui profil tim
			</button>

			<!-- Modal -->
			<div class="modal fade" id="edit-team" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Perbaharui profil tim</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form enctype="multipart/form-data" action="/team/{{Auth::user()->id}}" method="POST">
							@csrf
							{{method_field('PUT')}}
							<div class="modal-body">
								<div>
									<label for="name">Username</label>
									<input id="name" type="text" name="name" value="{{Auth::user()->name}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} mb-2" required autofocus>
									@if ($errors->has('name'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
								</div>
					
								<div>
									<label for="teamname">Nama Tim</label>
									<input id="teamname" type="text" name="teamname" value="{{Auth::user()->teamname}}" class="form-control{{ $errors->has('teamname') ? ' is-invalid' : '' }} mb-2" required autofocus>
									@if ($errors->has('teamname'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('teamname') }}</strong>
										</span>
									@endif
								</div>
					
								<div>
									<label for="description">Deskripsi</label>
									<textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} mb-2" required>{{Auth::user()->description}}</textarea>
									@if ($errors->has('description'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('description') }}</strong>
										</span>
									@endif
								</div>
					
								<div>
									<label for="email">Email</label>
									<input id="email" type="text" name="email" value="{{Auth::user()->email}}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} mb-2" required>
									@if ($errors->has('email'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
					
								<div>
									<label for="phonenumber">Phonenumber</label>
									<input id="phonenumber" type="text" name="phonenumber" value="{{Auth::user()->phonenumber}}" class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }} mb-2" required>
									@if ($errors->has('phonenumber'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('phonenumber') }}</strong>
										</span>
									@endif
								</div>
								<div class="alert alert-warning" role="alert">
									Ukuran foto <span>tidak boleh</span> lebih dari 2 MB
								</div>
								<input id="file" class="" type="file" name="avatar">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
								<button type="submit" name="submit" value="Simpan" class="btn btn-primary" required><i class="far fa-save"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#create-team">
		<i class="fas fa-plus"></i> Tambah anggota
	</button>

	<!-- Modal -->
	<div class="modal fade" id="create-team" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah anggota tim</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form enctype="multipart/form-data" action="{{route('member.store')}}" method="POST">
					@csrf
					<div class="modal-body">
						<div>
							<label for="name">Nama Lengkap</label>
							<input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} mb-2" required autofocus>
							@if ($errors->has('name'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>

						<div>
							<label for="steamid">ID Steam</label>
							<input id="steamid" type="text" name="steamid" class="form-control{{ $errors->has('steamid') ? ' is-invalid' : '' }} mb-2" required>
							@if ($errors->has('steamid'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('steamid') }}</strong>
								</span>
							@endif
						</div>

						<div>
							<label for="email">Email</label>
							<input id="email" type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} mb-2" required>
							@if ($errors->has('email'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
			
						<div>
							<label for="phonenumber">Nomor HP</label>
							<input id="phonenumber" type="text" name="phonenumber" class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }} mb-2" required>
							@if ($errors->has('phonenumber'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('phonenumber') }}</strong>
								</span>
							@endif
						</div>
			
						<div>
							<label for="address">Alamat</label>
							<textarea name="address" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }} mb-2" required></textarea>
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
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</div>
			</form>
		</div>
	</div>


	<h5>Detail anggota</h5>
	<div class="table-responsive">
		<table class="table table-striped table-sm">
	  		<thead>
	    		<tr>
					<th>#</th>
					<th>Nama anggota</th>
					<th>Foto</th>
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
							<td>
								<img src="/avatars/{{$m->avatar}}" width="80px" height="100px" alt="">
							</td>
							<td>{{$m->steamid}}</td>
							<td>{{$m->email}}</td>
							<td>{{$m->phonenumber}}</td>
							<td>{{$m->address}}</td>
							<td>
								{{-- Edit --}}
								{{-- <a href="/member/{{$m->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a> --}}
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{$m->id}}"><i class="fas fa-edit"></i></button>
							
								<!-- Modal -->
								<div class="modal fade" id="editModal{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Ubah anggota tim</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form enctype="multipart/form-data" action="{{route('member.store')}}" method="POST">
												@csrf
												<div class="modal-body">
													<div class="row">
														<label class="col-md-4" for="name">Nama Lengkap</label>
														<input id="name" type="text" value="{{$m->name}}" name="name" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('name') ? ' is-invalid' : '' }} mb-2" required autofocus>
														@if ($errors->has('name'))
															<span class="invalid-feedback">
																<strong>{{ $errors->first('name') }}</strong>
															</span>
														@endif
													</div>
							
													<div class="row">
														<label class="col-md-4" for="steamid">ID Steam</label>
														<input id="steamid" type="text" value="{{$m->steamid}}" name="steamid" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('steamid') ? ' is-invalid' : '' }} mb-2" required>
														@if ($errors->has('steamid'))
															<span class="invalid-feedback">
																<strong>{{ $errors->first('steamid') }}</strong>
															</span>
														@endif
													</div>
							
													<div class="row">
														<label class="col-md-4" for="email">Email</label>
														<input id="email" type="text" value="{{$m->email}}" name="email" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('email') ? ' is-invalid' : '' }} mb-2" required>
														@if ($errors->has('email'))
															<span class="invalid-feedback">
																<strong>{{ $errors->first('email') }}</strong>
															</span>
														@endif
													</div>
										
													<div class="row">
														<label class="col-md-4" for="phonenumber">Nomor HP</label>
														<input id="phonenumber" type="text" value="{{$m->phonenumber}}" name="phonenumber" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }} mb-2" required>
														@if ($errors->has('phonenumber'))
															<span class="invalid-feedback">
																<strong>{{ $errors->first('phonenumber') }}</strong>
															</span>
														@endif
													</div>
										
													<div class="row">
														<label class="col-md-4" for="address">Alamat</label>
														<textarea name="address" id="address" style="margin-left: 15px" class="col-md-7 form-control{{ $errors->has('address') ? ' is-invalid' : '' }} mb-2" required>{{$m->address}}</textarea>
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
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
													<input type="submit" class="btn btn-primary" value="Simpan">
												</div>
											</div>
										</form>
									</div>
								</div>


								{{-- Delete --}}
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$m->id}}"><i class="fas fa-trash-alt"></i></button>
								<!-- Modal -->
								<div class="modal fade" id="deleteModal{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
										    	<form class="form group" action="/member/{{$m->id}}" method="POST">
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