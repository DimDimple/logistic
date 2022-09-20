<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DMgo</title>
    <link rel="icon" href="{{ asset('images/logo1removebg.png') }}" type="image/png" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Style Css -->
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel="stylesheet" href={{ asset('css/topsidebar.css') }}>
    <link rel="stylesheet" href={{ asset('css/container.css') }}>
    <link rel="stylesheet" href={{ asset('css/contactUs.css') }}>
    <link rel="stylesheet" href={{ asset('css/information.css') }}>
    <link rel="stylesheet" href={{ asset('css/faq.css') }}>
    <link rel="stylesheet" href={{ asset('css/privacy.css') }}>
    <link rel="stylesheet" href={{ asset('css/terms.css') }}>
    <link rel="stylesheet" href={{ asset('css/profile.css') }}>
    <link rel="stylesheet" href={{ asset('css/editprofile.css') }}>


    {{-- icon --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    {{-- toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
     {{-- {!! Toastr::message() !!} --}}
     <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
     <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body class="antialiased">

    @include('layouts.nav')

    @yield('content')

    @include('layouts.footer')

    <script src="{{ asset('js/faq.js') }}"></script>

   <!-- show alert -->
    {{-- <script>
        $(document).ready(function() {
            // show the alert
            $(".alert").fadeTo(4000, 500).slideUp(500, function() {
                $(".alert").alert('close');
            });
        });
    </script> --}}



</body>

<!-- edit profile-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</html>
