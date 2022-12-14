@extends('login')

@section('content')
    <section class="vh-100" style="background-color: #FFEACF;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-0">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input id="name" type="text" placeholder="Name"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                <label class="form-label" for="form3Example1c">{{ __('') }}</label>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-0">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input id="phone" type="Number" placeholder="Phone Number"
                                                    class="form-control @error('name') is-invalid @enderror" name="phone"
                                                    value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                                <label class="form-label" for="form3Example1c">{{ __('') }}</label>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-0">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input id="email" type="email" placeholder="Email Address"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email">

                                                <label class="form-label" for="form3Example3c">{{ __('') }}</label>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- password -->
                                        <div class="d-flex flex-row align-items-center mb-0">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input id="password" type="password" placeholder="Password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">
                                                <div style="margin-left:380px; position:absolute; margin-top:-30px">
                                                    <i class="bi bi-eye-slash" id="toggle_password"
                                                        onclick="showPassword('password')"></i>
                                                </div>

                                                <label class="form-label" for="form3Example4c">{{ __('') }}</label>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- confirm password -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input  id="password-confirm" type="password" placeholder="Confirm Password"
                                                    class="form-control" name="password_confirmation" required
                                                    autocomplete="new-password">
                                                <div style="margin-left:380px; position:absolute; margin-top:-30px">
                                                    <i class="bi bi-eye-slash" id="toggle_password3"
                                                        onclick="showPassword('password-confirm')"></i>
                                                </div>
                                                <label class="form-label" for="form3Example4cd">{{ __('') }}</label>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3c" required />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="/information/termXcondition">Terms of service</a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg"
                                                style="background-color:rgb(227, 155, 67); border:rgb(205, 180, 150)">
                                                {{ __('Register') }}</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src='https://img.freepik.com/free-vector/tiny-people-doing-priorities-checklist-flat-illustration_74855-16294.jpg?w=1060&t=st=1659347882~exp=1659348482~hmac=98bd539d1f9fb40ed7c1f2857c69a39ce121156631db2e2bfcfa9403b78b8778'
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- script for toggle password  -->
    <script>
        const toggle_password = document.querySelector('#toggle_password');
        const toggle_password2 = document.querySelector('#toggle_password2');
        const toggle_password3 = document.querySelector('#toggle_password3');
        // const password = document.querySelector('#password');

        toggle_password.addEventListener("click", function() {

            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        toggle_password2.addEventListener("click", function() {

            this.classList.toggle("bi-eye");
        });

        toggle_password3.addEventListener("click", function() {

            this.classList.toggle("bi-eye");
        });

        // //prevent form submit
        // const form = document.querySelector('form');
        // form.addEventListener('submit',function(e){
        //     e.preventDefault();
        // })
        function showPassword(idclick) {
            const password = document.querySelector('#' + idclick);
            //alert(idclick);
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

        }
    </script>
@endsection
