<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/styles/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/styles/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('/styles/jdt/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/styles/style.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    @include('includes.nav')
    <div class="container animate__animated  animate__fadeInDown" data-aos="fade-up" data-aos-duration="1000">
        @include('includes.message')
        @yield('content')
    </div>
    <script src="{{ asset('/bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/styles/jdt/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/styles/aos/aos.js') }}"></script>

    <script>
        AOS.init()
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#table').DataTable();
        })
    </script>
</body>

</html>
