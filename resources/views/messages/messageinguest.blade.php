@extends('layouts.admin_layout')

@section('active5')
	active
@endsection

@section('pagetitle')
	<b><i class="fas fa-envelope"></i> Pesan Masuk</b>
@endsection

@section('content')
    <div class="card mb-4 elevation">
        <div class="card-body">
            <center>
                <div class="btn-group special mb-4" role="group" aria-label="...">
                    <a href="/admin/message" class="btn btn-primary">Pesan dari Tim</a>
                    <a href="/admin/mesage/guest" class="btn btn-primary">Pesan dari Guest</a>
                </div>
            </center>
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
            <div class="table-responsive" id="teamMsg">
                <table id="datatables" class="table">
                    <thead>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
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
                                    <td><center>
                                        <a href="/admin/message-guest/{{$m->id}}"><i style="font-size: 24px; color:#343a40" class="fas fa-eye"></i></a></center>
                                    </td>
                                    <td><center>{{$m->created_at->diffForHumans()}}</center></td>
                                    <td>
                                        {{-- Delete --}}
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$m->id}}"><i class="fas fa-trash-alt"></i></button>
										<!-- Modal -->
										<div class="modal fade" id="deleteModal{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-user-times text-danger"></i> Konfirmasi</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<center><p>Apakah Anda yakin menghapus pesan dari <b>{{$m->name}}</b></p></center>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
														<form class="form group" action="/admin/message-guest/{{$m->id}}" method="POST">
															@csrf
															{{method_field('DELETE')}}
															<button style="border-radius: 0px" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
                                <td colspan="6"><center>Tidak ada pesan</center></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection