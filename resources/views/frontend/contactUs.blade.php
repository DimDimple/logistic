@extends('layouts.newapp')

@section('content')
    {!! Toastr::message() !!}
    <div class="contact-container">
        <div class="contact-header">
            <h3>CONTACT US</h3>
            <h6>We'd Love To Help You.</h6>
        </div>
        <div class="box-form">
            <div class="left-side">
                <img src="https://cdn.pixabay.com/photo/2012/04/05/00/57/telephone-25477_960_720.png">
            </div>
            <div class="contact-form">
                <div class="contact-details">
                    <p><i class='bx bx-map'></i><span>Toul Kork, Phnom Penh, Cambodia</span></p>
                    <p><i class='bx bx-phone-call'></i><span>Phone: +855 77 563 784</span></p>
                    <p><i class='bx bx-message-alt-detail'></i> <span>Email: dmgo.kh@mail.com</span> </p>
                </div>
                <p>If you have any problems, Please let's us know.</p>

                <form method="post" action="{{ route('contact.store') }}">
                    @csrf
                    <input class="input_name" type="text" id="name" name="name" placeholder="Name">
                    <input class="input_phone" type="text" id="phone" name="phone" placeholder="Phone"><br>
                    <input class="input_email" type="email" id="email" name="email" placeholder="Email">
                    <textarea class="input_message" rows="5" type="text" name="message" id="message" placeholder=" Message"></textarea>
                    <button type="submit" class="input_submit"> Send Message</button>
                </form>
            </div>
        </div>
    </div>
    <!-- show alert -->
    {{-- <script>
        $(document).ready(function() {
            // show the alert
            $(".alert").fadeTo(4000, 500).slideUp(500, function() {
                $(".alert").alert('close');
            });
        });
    </script> --}}
@endsection
