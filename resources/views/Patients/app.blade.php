{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Denno Hosi</title>
    <!-- Favicon icon -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('Admin-file/images/favicon.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ asset('./Admin-file/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('./Admin-file/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./Admin-file/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('Admin-file/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>


    <div>
        @include('sweetalert::alert')
    </div>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

         @include('Patients.navbar')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        @include('Patients.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->


        @yield('content')


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="#">Denno Developer</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

        {!! Toastr::message() !!}
    <script src="Admin-file/plugins/common/common.min.js"></script>
    <script src="Admin-file/js/custom.min.js"></script>
    <script src="Admin-file/js/settings.js"></script>
    <script src="Admin-file/js/gleek.js"></script>
    <script src="Admin-file/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src=".Admin-file/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="{{ asset('./Admin-file/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{ asset('./Admin-file/plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('./Admin-file/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('./Admin-file/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('./Admin-file/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('./Admin-file/plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('./Admin-file/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('./Admin-file/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('./Admin-file/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('./Admin-file/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



    <script src="{{ asset('./Admin-file/js/dashboard/dashboard-1.js') }}"></script>

</body>

</html>

