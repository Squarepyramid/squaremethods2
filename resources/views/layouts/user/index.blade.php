<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
<link rel="stylesheet" href="{{asset('dashboard/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
        <link rel="stylesheet" href="{{asset('dashboard/assets/fonts/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{ url('/plugins/fontawesome-free/css/all.min.css') }}">
        <script src="https://kit.fontawesome.com/3a988c450f.js" crossorigin="anonymous"></script>
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

{{--        .custom-blockquote {--}}
{{--        border-left: 5px solid #0069d9; /* Adjust the color and width as needed */--}}
{{--        padding-left: 15px; /* Adjust the padding as needed */--}}
{{--        background-color: #f5f5f5; /* Optional background color */--}}
{{--        }--}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </head>

        <body id="page-top">

        <div id="wrapper">

            @include('layouts.user.menu.index')
            <div class="d-flex flex-column" id="content-wrapper">
                <div>
                    @include('layouts.user.user.index')
                </div>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
                <a className="border rounded d-inline scroll-to-top" href="#page-top">
                    <i className="fas fa-angle-up"></i>
                </a>
        </div>
        @include('layouts.user.footer.index')
        <script src="{{asset('dashboard/assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/bs-init.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/theme.js')}}"></script>
        </body>

</html>
