@extends('layouts.admin_layout')

@section('pagetitle')
	<b><i class="fas fa-users"></i> Daftar Tim</b>
@endsection

@section('content')
	<div class="card mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table id="datatables" class="table">
					<thead>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">Status Pembayaran</th>
						<th scope="col">Bukti Pembayaran</th>
						<th scope="col">Status Konfirmasi</th>
						<th scope="col">Aksi</th>
					</thead>
					<tbody>
						@if(count($team))
							@foreach($team as $t)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>
										<p><a onclick="team_member({{ $t->id }})" href="#" data-toggle="modal" data-target="#teamDetail{{$t->id}}" class="text-dark"><b>{{$t->teamname}}</b></a></p>
									</td>
									<td>
										@if($t->payment == null)
											<center><i style="font-size: 24px" class="text-danger fas fa-times"></i></center>
										@else
											<center><i style="font-size: 24px" class="text-success fas fa-check"></i></center>
										@endif
									</td>
									<td>
										@if($t->payment == null)
											<center><i style="font-size: 24px" class="text-danger fas fa-times"></i></center>
										@else
										{{-- Button Trigger Modal --}}
											<p><a href="#" data-toggle="modal" data-target="#paymentPhoto{{$t->id}}" class="text-success"><i style="font-size: 24px" class="fas fa-eye"></i></a></p>						
												
											<!-- Modal -->
											<div class="modal fade" id="paymentPhoto{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle"><i></i> Bukti pembayaran</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<img src="/avatars/{{$t->payment}}" alt="" width="400px" height="auto">
														</div>
															<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
														</div>
													</div>
												</div>
											</div>
										@endif
									</td>
									<td>
										@if($t->confirmation == 0)
											<center><i style="font-size: 24px" class="text-danger fas fa-times"></i></center>
										@else
											<center><i style="font-size: 24px" class="text-success fas fa-check"></i></center>
										@endif
									</td>
									<td>
										@if($t->confirmation == 0)
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#confirmationModal{{$t->id}}">
												<i class="fas fa-check"></i>
											</button>

											<!-- Modal -->
											<div class="modal fade" id="confirmationModal{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="/admin/payment-confirm/{{$t->id}}" method="POST">
															@csrf
															{{method_field('PUT')}}
															<div class="modal-body">
																Apakah anda ingin mengkonfirmasi pembayaran tim <b>{{$t->teamname}}</b> ?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
																<button type="submit" name="submit" value="simpan" class="btn btn-success"><i class="fas fa-check"></i></button>
															</div>
														</form>
													</div>
												</div>
											</div>
										@else
											<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelConfirmationModal{{$t->id}}">
												<i class="fas fa-times"></i>
											</button>

											<!-- Modal -->
											<div class="modal fade" id="cancelConfirmationModal{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="/admin/payment-unconfirm/{{$t->id}}" method="POST">
															@csrf
															{{method_field('PUT')}}
															<div class="modal-body">
																Apakah anda ingin membtalkan konfirmasi pembayaran tim <b>{{$t->teamname}}</b> ?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
																<button type="submit" name="submit" value="simpan" class="btn btn-danger"><i class="fas fa-check"></i></button>
															</div>
														</form>
													</div>
												</div>
											</div>
										@endif
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
	<div id="modal-team-detail">

	</div>
	<script>
		function team_member(id){
			var url = "/admin/show-member/" + id;
			$.ajax({
				type:'get',
				url:url,
				success: function(data){
					$('#modal-team-detail').html(data);
					$('#teamDetail').modal('show');
				}
			})
		}
	</script>

@endsection