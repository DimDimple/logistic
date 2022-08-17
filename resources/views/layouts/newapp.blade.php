<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DMgo</title>

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

    {{-- icon --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>

    @include('layouts.nav')

    @yield('content')

    @include('layouts.footer')

    <script src="{{ asset('js/faq.js') }}">

    </script>

</body>

</html>
