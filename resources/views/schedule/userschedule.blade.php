<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto mr-5">
                <!-- Authentication Links -->
                <a class="nav-link" href="{{ route('team.index') }}"><i class="fas fa-desktop"></i> {{ __('Kelola tim') }}</a></li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="/avatars/{{Auth::user()->avatar}}" width="28px" height="28px" style="border-radius: 50%;" alt="">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div style="margin-top: 20px;">
		<div class="container-fluid">
			<div class="row">
	        	<nav class="col-md-2 d-none d-md-block bg-light sidebar"  style="margin-top:40px">
	          		<div class="sidebar-sticky">
	            		<ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('team.index') }}">
                                <i class="fas fa-desktop"></i> Dashboard</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.jadwal') }}">
                                <i class="fas fa-calendar-alt"></i> Jadwal</a>
                            </li>
			            </ul>
	          		</div>
	        	</nav>

	        	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 mt-5">
		          	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		            	<h1 class="h2"><b><i class="fas fa-calendar-alt"></i> Jadwal</b></h1>
	         	 	</div>					  

	         	 	<div class="card mb-4 elevation">
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
				</main>
			</div>
		</div>
	</div>
	<!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <!-- Font Awesome -->
    <script type="text/javascript" src="{{ asset('js/fontawesome-all.js') }}" async></script>

    {{-- Custom js --}}
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable();
        } );
    </script>
</body>
</html>



@section('pagetitle')
	
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