@extends('layouts.app')

@section('content')
    <!--==========================
    Intro Section
    ============================-->
    <div id="cover">
        <div class="cover-text">
            <h2>Welcome to IT-ESSEGA</h2>
            <p>Daftarkan timmu dan jadilah juara</p>
            <a href="{{route('register')}}" class="btn-cover">Daftar</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2 class="section-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="img-fluid mx-auto" width="500px" height="500px" src="{{ asset('img/section1.jpg') }}">
            </div>
        </div>

        <hr class="divider">

        <div class="row">
            <div class="col-md-7 order-md-2">
                <h2 class="section-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="img-fluid mx-auto" width="500px" height="500px" src="{{ asset('img/section2.jpg') }}">
            </div>
        </div>

        <hr class="divider">

    </div>

    <!-- FOOTER -->
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 IT-ESEGA &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>



@endsection
