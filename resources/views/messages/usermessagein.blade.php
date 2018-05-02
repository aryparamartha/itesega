@extends('layouts.dashboard_layout')

@section('active3')
	active
@endsection

@section('pagetitle')
	<b><i class="fas fa-envelope"></i> Pesan Masuk</b>
@endsection

@section('content')
    <div class="card mb-4 elevation">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @if(Session::has('error'))
                        <h4><i class="text-danger fas fa-times mr-1"></i>{{Session::get('error')}}</h4>
                    @endif

                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="text-success fas fa-check mr-1"></i> {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAdminModal">
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
            </div> --}}

            <div class="table-responsive">
                <table id="datatables" class="table">
                    <thead>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th>Waktu</th>
                    </thead>
                    <tbody>
                        @if(count($allMessage))
                            @foreach($allMessage as $m)
                                <tr>
                                    @if($m->view == 0)
                                        <td>{{$loop->iteration}} <span class="badge badge-warning"><i class="fas fa-flag"></i></span></td>
                                    @else
                                        <td>{{$loop->iteration}}</td>
                                    @endif
                                    <td><center>{{$m->name}}</center></td>
                                    <td><center>{{$m->email}}</center></td>
                                    <td><center>{{$m->subject}}</center></td>
                                    <td>
                                        <center>
                                            <a href="/user/message/{{$m->id}}"><i style="font-size: 24px; color:#343a40" class="fas fa-eye"></i></a>
                                        </center>
                                    </td>
                                    <td><center>{{$m->created_at->diffForHumans()}}</center></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6"><center>Tidak ada pesan</center></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection