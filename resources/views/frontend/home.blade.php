
@extends('layouts.newapp')

@section('content')
<div class="image">
    <div class="thumb">
        <h2>Fast is fine but accuracy
            <br> everything.
        </h2>

        <p>DMgo Express will provide you the good delivery. </p>

       <a></a> <img src={{ asset('images/bg.png') }} alt="">
    </div>
    <div style="margin-top:-80px" class="card card-3">
        <h1>Track Your Package !</h1>
        <div class="container">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Type Search.....">

                <button class="search-button">
                    <i class='bx bx-search' style='color:#DE8F1F'></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="wrapper-1">
    <div class="box box1">
        <img src={{ asset('images/v.jpg') }} alt="">
    </div>
    <div class="box box2">
        <h3>Our Service</h3>
        <h4>Land freight</h4>
        <p>To become the world’s preferred supply chain logistics company – applying insight, service quality, and
            innovation to create sustainable growth for business and society.</p>
    </div>
</div>

<div class="wrapper-1">
    <div class="box box1">
        <h3>Our Vision</h3>
        <p>Connecting people, businesses, and communities to a better future – through logistics.</p>
    </div>
    <div class="box box2">
        <img src={{ asset('images/close-up-smiley-delivery-man.jpg') }} alt="">
    </div>
</div>

<div class="wrapper-2">
    <div class="box">
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

  
@endsection
