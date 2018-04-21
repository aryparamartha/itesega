@extends('layouts.admin_layout')

@section('pagetitle')
	<b><i class="fas fa-user-secret"></i> Daftar Admin</b>
@endsection

@section('content')
	<div class="card">
		<div class="card-body">
			<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAdminModal">
				<i class="fas fa-user-plus"></i>
			</button>
			<!-- Modal -->
			<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-user-plus"></i> Tambah akun admin</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>											
						</div>
						<form action="/admin/register" method="post">
							@csrf
							<div class="modal-body">
								<div class="form-group row">
									<label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Username') }}</label>

									<div class="col-md-8">
										<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

										@if ($errors->has('name'))
											<span class="invalid-feedback">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail') }}</label>

									<div class="col-md-8">
										<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

										@if ($errors->has('email'))
											<span class="invalid-feedback">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

									<div class="col-md-8">
										<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

										@if ($errors->has('password'))
											<span class="invalid-feedback">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Konfirmasi Password') }}</label>

									<div class="col-md-8">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
								<button type="submit" name="submit" value="Simpan" class="btn btn-primary" required><i class="far fa-save"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="table-responsive">
				<table id="datatables" class="table">
					<thead>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">Email</th>
						<th scope="col">Aksi</th>
					</thead>
					<tbody>
						@if(count($admin))
							@foreach($admin as $a)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$a->name}}</td>								
									<td>{{$a->email}}</td>
									<td>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editAdmin{{$a->id}}">
											<i class="fas fa-edit"></i>
										</button>
										<!-- Modal -->
										<div class="modal fade" id="editAdmin{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-edit"></i> Ubah akun admin <b>{{$a->name}}</b></h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>											
													</div>
													<form action="/admin/update-account/{{$a->id}}" method="post">
														@csrf
														{{method_field('PUT')}}
														<div class="modal-body">
															<div class="form-group row">
																<label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Username') }}</label>
									
																<div class="col-md-8">
																	<input id="name" type="text" value="{{$a->name}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
									
																	@if ($errors->has('name'))
																		<span class="invalid-feedback">
																			<strong>{{ $errors->first('name') }}</strong>
																		</span>
																	@endif
																</div>
															</div>
									
															<div class="form-group row">
																<label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail') }}</label>
									
																<div class="col-md-8">
																	<input id="email" type="email" value="{{$a->email}}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
									
																	@if ($errors->has('email'))
																		<span class="invalid-feedback">
																			<strong>{{ $errors->first('email') }}</strong>
																		</span>
																	@endif
																</div>
															</div>
									
															<div class="form-group row">
																<label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>
									
																<div class="col-md-8">
																	<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
									
																	@if ($errors->has('password'))
																		<span class="invalid-feedback">
																			<strong>{{ $errors->first('password') }}</strong>
																		</span>
																	@endif
																</div>
															</div>
									
															<div class="form-group row">
																<label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Konfirmasi Password') }}</label>
									
																<div class="col-md-8">
																	<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
															<button type="submit" name="submit" value="Simpan" class="btn btn-primary" required><i class="far fa-save"></i></button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</td>
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
		</div>
	</div>
@endsection