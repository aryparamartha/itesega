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

		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('css/main.css')}}">

		<!-- Font Awesome -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini rtl">
	<!-- Navbar-->
	<header class="app-header"><a class="app-header__logo" href="index.html">IT-ESEGA</a>
		<!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
		<!-- Navbar Right Menu-->
		<ul class="app-nav">
			<li class="app-search">
				<input class="app-search__input" type="search" placeholder="Search">
				<button class="app-search__button"><i class="fa fa-search"></i></button>
			</li>
			<!--Notification Menu-->
			<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="far fa-bell fa-lg"></i></a>
				<ul class="app-notification dropdown-menu dropdown-menu-right">
					<li class="app-notification__title">You have 4 new notifications.</li>
					<div class="app-notification__content">

					</div>
					<li class="app-notification__footer"><a href="#">See all notifications.</a></li>
				</ul>
			</li>
			<!-- User Menu-->
			<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
				<ul class="dropdown-menu settings-menu dropdown-menu-right">
					<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
					<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
					<li><a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fas fa-sign-out-alt fa-lg"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</header>
	<!-- Sidebar menu-->
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
	<aside class="app-sidebar">
		<div class="app-sidebar__user"><img class="app-sidebar__user-avatar" height="50px" width="50px" src="/avatars/default.jpg" alt="User Image">
			<div>
				<p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
				<p class="app-sidebar__user-designation">Admin</p>
			</div>
		</div>
		<ul class="app-menu">
            <li><a class="app-menu__item @yield('active1')" href="{{route('admin.dashboard')}}"><i class="app-menu__icon fas fa-tachometer-alt mr-2"></i><span class="app-menu__label"> Dashboard</span></a></li>
            <li><a class="app-menu__item @yield('active2')" href="{{route('admin.account-list')}}"><i class="app-menu__icon fas fa-user-secret mr-2"></i><span class="app-menu__label"> Admin</span></a></li>
            <li><a class="app-menu__item @yield('active3')" href="{{route('admin.team')}}"><i class="app-menu__icon fas fa-users mr-2"></i><span class="app-menu__label"> Tim</span></a></li>
			<li><a class="app-menu__item @yield('active4')" href="{{route('schedule.index')}}"><i class="app-menu__icon fas fa-calendar-alt mr-2"></i><span class="app-menu__label"> Jadwal</span></a></li>
			<li><a class="app-menu__item @yield('active5')" href="#"><i class="app-menu__icon fa fa-chart-pie mr-2"></i><span class="app-menu__label"> Charts</span></a></li>
			<li><a class="app-menu__item @yield('active6')" href="#"><i class="app-menu__icon fa fa-edit mr-2"></i><span class="app-menu__label"> Forms</span></a></li>
			<li><a class="app-menu__item @yield('active7')" href="#"><i class="app-menu__icon fa fa-th-list mr-2"></i><span class="app-menu__label">Tables</span></a></li>
			<li><a class="app-menu__item @yield('active8')" href="#"><i class="app-menu__icon fas fa-file-alt mr-2"></i><span class="app-menu__label">Pages</span></a></li>
		</ul>
	</aside>
	<main class="app-content">
		<div class="app-title elevation">
			<div>
				<h1>@yield('pagetitle')</h1>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fas fa-tachometer-alt"></i></li>
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			</ul>
		</div>
		<div>
			@yield('content')
		</div>
	</main>
	<!-- Scripts -->
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	<!-- The javascript plugin to display page loading on top-->
	<script type="text/javascript" src="{{ asset('js/plugins/pace.min.js') }}"></script>
	<!-- Page specific javascripts-->
	<script type="text/javascript" src="{{ asset('js/plugins/chart.js') }}"></script>

	<!-- Font Awesome -->
	<script type="text/javascript" src="{{ asset('js/fontawesome-all.js') }}" async></script>

	{{-- Custom js --}}
	<script>
		$(document).ready(function() {
			$('#datatables').DataTable();
		} );
	</script>

	<script type="text/javascript">
		var data = {
			labels: ["January", "February", "March", "April", "May"],
			datasets: [
				{
					label: "My First dataset",
					fillColor: "rgba(220,220,220,0.2)",
					strokeColor: "rgba(220,220,220,1)",
					pointColor: "rgba(220,220,220,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(220,220,220,1)",
					data: [65, 59, 80, 81, 56]
				},
				{
					label: "My Second dataset",
					fillColor: "rgba(151,187,205,0.2)",
					strokeColor: "rgba(151,187,205,1)",
					pointColor: "rgba(151,187,205,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(151,187,205,1)",
					data: [28, 48, 40, 19, 86]
				}
			]
		};
		var pdata = [
			{
					value: 300,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Complete"
			},
			{
					value: 50,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "In-Progress"
			}
		]

		var ctxl = $("#lineChartDemo").get(0).getContext("2d");
		var lineChart = new Chart(ctxl).Line(data);

		var ctxp = $("#pieChartDemo").get(0).getContext("2d");
		var pieChart = new Chart(ctxp).Pie(pdata);
	</script>
	<!-- Google analytics script-->
	<script type="text/javascript">
		if(document.location.hostname == 'pratikborsadiya.in') {
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				ga('create', 'UA-72504830-1', 'auto');
				ga('send', 'pageview');
		}
	</script>
</body>
</html>
