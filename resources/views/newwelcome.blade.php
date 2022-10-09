<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DMgo</title>
    <link rel="icon" href="{{ asset('images/logo1removebg.png') }}" type="image/png" />

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

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


    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>


<body class="antialiased">
    @include('layouts.nav')
    <div class="image">
        <div class="thumb">
            <h2>Fast is fine but accuracy
                <br> everything.
            </h2>

            <p>DMgo Express will provide you the good delivery. </p>

            <img src={{ asset('images/bg.png') }} alt="">
        </div>
        <div class="card_1 card-3" style="margin-top:-120px;">
            <h1><b>Track Your Package !</b></h1>
            <form class="col-md-8" action="{{ route('tracking') }}">
                <div class="container">
                    <div class="search-box">
                        <input type="text" id="datatable-search-input" class="search-input" name="reference_number"
                            placeholder="Search reference number.....">
    
                        <button class="search-button">
                            <i class='bx bx-search' style='color: #DE8F1F; margin-top:-1px'></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="wrapper-1" style="margin-top: 180px">
        <div class="box box1">
            <img src={{ asset('images/v.jpg') }} alt="">
        </div>
        <div class="box box2">
            <h3>Our Service</h3>
            <h4>Land freight</h4>
            <p>To become the world’s preferred supply chain logistics company – applying insight, service quality, and
                innovation to create sustainable growth for business and society.Transportation management focuses on
                planning, optimizing and executing the use of vehicles to move goods between warehouses, retail
                locations and customers. The transportation is multimodal and can include ocean, air, rail and roads.
            </p>
        </div>
    </div>

    <div class="wrapper-1" style="margin-top: 100px">
        <div class="box box1">
            <h3>Our Vision</h3>
            <p>Connecting people, businesses, and communities to a better future – through logistics.While on-time
                delivery of intact packages has always been important throughout the supply chain, it has become even
                more mission-critical in recent years as commerce, with its same-day home or retail delivery
                of customized products ordered from smartphones, becomes more common.</p>
        </div>
        <div class="box box2">
            <img src={{ asset('images/close-up-smiley-delivery-man.jpg') }} alt="">
        </div>
    </div>

    <div class="wrapper-2">
        <div class="box box3">
            <h3>Company History</h3>
            <p>Transportation, the movement of goods and persons from place to place it means we build website to allow
                user can keep track of transportation parcels when it on the way or complete.
                t involves an entire chain of services with the purpose of delivering goods to various locations by
                different means. Besides transportation, these operations also include storage,
                management, and control. From the initial idea to provide supplies for warfare, logistics expanded its
                use in various aspects of life. Nowadays, it’s an entire industry that provides
                extended maneuvering capabilities you can see across multiple delivery services.
            </p>
        </div>
    </div>
    @include('layouts.footer')

</body>

</html>
