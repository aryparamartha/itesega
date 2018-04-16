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

    <!-- Font Awesome -->
    <script type="text/javascript" src="{{ asset('js/fontawesome-all.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
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
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
    </nav>
    <div style="margin-top: 20px;">
		<div class="container-fluid">
			<div class="row">
	        	<nav class="col-md-2 d-none d-md-block bg-light sidebar">
	          		<div class="sidebar-sticky">
	            		<ul class="nav flex-column">
	              			<li class="nav-item">
	                			<a class="nav-link" href="{{ route('admin.home') }}">
                				<i class="fas fa-home"></i> Dashboard</a>
	                		</li>
			              	<li class="nav-item">
				                <a class="nav-link" href="{{ route('jadwal.index') }}">
			                  	<i class="fas fa-calendar-alt"></i> Jadwal</a>
			              	</li>

			            </ul>
	          		</div>
	        	</nav>

	        	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 mt-5">
		          	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		            	<h1 class="h2">@yield('pagetitle')</h1>
	            		<div class="btn-toolbar mb-2 mb-md-0">
		              		<div class="btn-group mr-2">
		                		<button class="btn btn-sm btn-outline-secondary">Share</button>
		                		<button class="btn btn-sm btn-outline-secondary">Export</button>
		              		</div>
		              		<button class="btn btn-sm btn-outline-secondary dropdown-toggle">
		                		<span data-feather="calendar"></span>
		                	This week
		              		</button>
		            	</div>
	         	 	</div>

	         	 	{{-- <canvas class="my-4" id="myChart" width="900" height="380"></canvas>--}}

	         	 	@yield('content')

				</main>
			</div>
		</div>
	</div>
	<!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}">
    </script><script type="text/javascript" src="{{ asset('js/easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hoverIntent.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/superfish.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/magnific-popup.min.js') }}"></script>

    {{-- Contact Form Javascript File --}}
    <script type="text/javascript" src="{{ asset('js/contactform.js') }}"></script>

    {{-- Main js --}}
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>
</html>
