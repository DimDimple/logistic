@extends('backend.manager.layouts.dashboard')

@section('content')


    <div class="container rounded bg-white mt-5">
        <div class="row covered">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <h3 class="text-black-50">Change Password</h3>
                    <img src={{ asset('images/lock1.png') }} alt="">
                    <strong>Password must contain at least 8 digits</strong>
                </div>
            </div>
            <form action="{{ route('updatePwdM') }}" class="col-md-8" method="POST">
                @csrf
                <div class="p-3 py-5 ">
                    <div class="row mt-2">
                        <div class="col-md-10">
                            <label for="old_password-pw" class="form-label">Old Password</label>
                            <input type="password" id="password"
                                class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                placeholder="">
                            <div style="margin-left:550px; position:absolute; margin-top:-30px"><i class="bi bi-eye-slash"
                                    id="toggle_password" onclick="showPassword('password')"></i></div>
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-10">
                            <label for="new-pwd" class="form-label">New Password</label>
                            <input type="password" id="new-pwd"
                                class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                            <div style="margin-left:550px; position:absolute; margin-top:-30px"><i class="bi bi-eye-slash"
                                    id="toggle_password2" onclick="showPassword('new-pwd')"></i></div>
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-md-10">
                            <label for="con-pwd" class="form-label">Confirm Password</label>
                            <input type="password" id="con-pwd"
                                class="form-control @error('new_password') is-invalid @enderror" value=""
                                name="new_password_confirmation">
                            <div style="margin-left:550px; position:absolute; margin-top:-30px"><i class="bi bi-eye-slash"
                                    id="toggle_password3" onclick="showPassword('con-pwd')"></i></div>
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-5 text-right">
                        <button class="btn btn-success profile-button" type="submit">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
