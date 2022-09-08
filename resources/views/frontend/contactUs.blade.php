@extends('layouts.newapp')

@section('content')
    <div class="contact-container">
        <div class="contact-header">
            <h2>CONTACT US</h2>
            <h3>We'd Love To Help You.</h3>
        </div>
        <div class="left-side"><img src="https://cdn.pixabay.com/photo/2012/04/05/00/57/telephone-25477_960_720.png"></div>
        <div class="contact-form">
            <div class="contact-details">
                <p><i class='bx bx-map'></i><span>Toul Kork, Phnom Penh, Cambodia</span></p>
                <p><i class='bx bx-phone-call'></i>Phone: +855 77 563 784</p>
                <p><i class='bx bx-message-alt-detail'></i>Email: dmgo.kh@mail.com</p>
            </div>
            <p>If you have any problems, Please let's us know.</p>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form method="post" action="{{ route('contact.store') }}">
                @csrf
                <input class="input_name" type="text" id="name" name="name" placeholder="Name">
                <input class="input_phone" type="text" id="phone" name="phone" placeholder="Phone"><br>
                <input class="input_email" type="email" id="email" name="email" placeholder="Email"><br>
                <textarea class="input_message" rows="5" type="text" name="message" id="message" placeholder=" Message"></textarea><br><br><br>
                <button type="submit" class="input_submit"> Send Message</button>
            </form>
        </div>

    </div>
@endsection
