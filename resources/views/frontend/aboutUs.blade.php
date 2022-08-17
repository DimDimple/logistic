@extends('layouts.newapp')

@section('content')
<div class="contact-container">
    <div class="contact-header">
      <h2>CONTACT US</h2>
        <h3>We'd Love To Help You.</h3>
    </div>
        <div class="left-side"><img src={{ asset('images/contact_us.jpg') }}></div>
        <div class="contact-form">
          <div class="contact-details">
            <p><i class='bx bx-map'></i><span>Toul Kork, Phnom Penh, Cambodia</span></p>
            <p><i class='bx bx-phone-call' ></i>Phone: +855 77 563 784</p>
            <p><i class='bx bx-message-alt-detail' ></i>Email: dmgo.kh@mail.com</p>
          </div>
          <p>If you have any problems, Please let's us know.</p>
          <form action="" method="post">
    <!--                 <label for="name">Name</label> -->
            <input type="text" id="fname" name="full_name" placeholder="Name">
            <!--         <label for="email">Email</label> -->
            <input type="email" id="femail" name="email" placeholder="Email" style="margin-left:5%">
            <!--         <label>Message</label> -->
            <textarea rows="5" type="text" id="fmessage" placeholder="Message"> </textarea>
            <button><i class='bx bx-send' ></i>SEND MESSAGE</button>
          </form>
        </div>
    
    </div>
@endsection
