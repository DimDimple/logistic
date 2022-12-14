@extends('login')

@section('content')
    <section class='images/bg-title-01.jpg'>
        <div class="container px-3 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-5" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: #DE8F1F">
                        The best offer <br />
                        <span style="color: rgb(247, 142, 6)">The logistic DimMey company</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(35, 73%, 60%)">
                        Dmgo Express
                    </p>
                </div>

                <div class="col-lg-6 mb-3 mb-lg-1 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-5 py-5 px-md-5">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger"
                                        style="display:flex; justify-content:center;align-items:center;">
                                        <p style="margin:0">{{ $message }}</p>
                                    </div>
                                @endif
                                <img src="https://img.freepik.com/free-vector/login-concept-illustration_114360-4525.jpg?w=826&t=st=1659347731~exp=1659348331~hmac=eecdacd10fbf093f65e6e3909d5b84aa32d7513c2bdc93d3ba320292918f4c67"
                                    style="width: 50%; padding-bottom: 10px; margin-left:100px " alt="">

                                <!-- Email input -->
                                <div class="form-outline mb-3">
                                    <input id="email" type="text" placeholder="Email Address"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label class="form-label" for="form3Example3">{{ __('') }}</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <input id="password" type="password" placeholder="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    <div style="margin-left:450px; position:absolute; margin-top:-30px">
                                        <i class="bi bi-eye-slash" id="toggle_password"
                                            onclick="showPassword('password')"></i>
                                    </div>

                                    <label class="form-label" for="form3Example4">{{ __('') }}</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-left mb-2">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>or sign up with:
                                        <a href="/register">Register</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        // show the alert
        $(".alert").fadeTo(3000, 500).slideUp(500, function() {
            $(".alert").alert('close');
        });
    </script>
    <script>
        const toggle_password = document.querySelector('#toggle_password');

        // const password = document.querySelector('#password');

        toggle_password.addEventListener("click", function() {

            // toggle the icon
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
