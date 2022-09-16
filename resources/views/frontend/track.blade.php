@extends('layouts.newapp')

@section('content')
    <div class="thumb track">
        <h2 style="margin: 10px; color: #fff">Dmgo Express</h2>
        <img src={{ asset('images/52460.jpg') }} alt="">
    </div>
    <div class="card_1 card-3" style="margin-top:-100px;">
        <h1><b>Track Your Package !</b></h1>
        <div class="container">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Type Search.....">

                <button class="search-button">
                    <i class='bx bx-search' style='color: #DE8F1F; margin-top:-1px'></i>
                </button>
            </div>
        </div>
    </div>
   
@endsection
