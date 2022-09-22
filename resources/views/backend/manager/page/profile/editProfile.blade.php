@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="container rounded bg-white mt-5">
        <div class="row covered">
            <div class="d-flex">
                <div class="col-md-6 border-right">
                    <form action="{{ route('uploadProfile.upload') }}"
                        class="d-flex flex-column align-items-center text-center p-3 py-5" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h3 class="text-black-50">Edit Profile</h3>
                        <input type="file" name="image" onchange="loadFile(event)"
                            style="position: absolute; opacity: 0; cursor: pointer; width: 20%; margin-top:51px; height: 20%; border: 1px solid; z-index: 10">
                        <img class="image rounded-circle" id="output"
                            src="{{ asset('/storage/images/' . Auth::user()->image) }}" alt="profile_image"
                            style="width: 100px; height: 100px; padding: 2px; margin: 0px; border: 3px solid rgb(227, 221, 221);">

                        <span class="font-weight-bold">
                            {{ Auth::user() ? Auth::user()->name : '' }}</span>
                        <span class="text-black-50"> {{ Auth::user() ? Auth::user()->email : '' }}</span>

                        <button class="btn btn-success profile-button" type="submit">Save Profile</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <ul class="nav nav-pills mt-5 " id="pills-tab" role="tablist">
                        <li class="nav-item " role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Edit Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Change Password</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <form action="{{ route('updateProfile.update', Auth::user()->id) }}" class="col-md-12"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="_method" value="put">
                                <div>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="p-3 py-2">
                                    {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                        <a href="/" style="color:black;">
                                            <h6>Back to home</h6>
                                        </a>
                                    </div>
                                    <h6 class="text-right">Edit Profile</h6>
                                </div> --}}
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="Username" class="form-label">Username</label>
                                            <input type="text" id="Username" class="form-control"
                                                placeholder="first name" name="name"
                                                value="{{ Auth::user() ? Auth::user()->name : '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" class="form-control" name="email"
                                                value=" {{ Auth::user() ? Auth::user()->email : '' }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                value="{{ Auth::user() ? Auth::user()->phone : '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                value="{{ Auth::user() ? Auth::user()->address : '' }} ">
                                        </div>
                                    </div>
                                    <div class="mt-5 text-right"><button class="btn btn-success profile-button"
                                            type="submit">Save
                                            Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form action="{{ route('updatePwdM') }}" class="col-md-8" method="POST">
                                @csrf
                                <div class="p-3 py-3">
                                    <div class="row mt-2">
                                        <div class="col-md-10">
                                            <label for="old_password-pw" class="form-label">Old Password</label>
                                            <input type="password" id="password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                name="old_password" placeholder="">
                                            <div style="margin-left:550px; position:absolute; margin-top:-30px"><i
                                                    class="bi bi-eye-slash" id="toggle_password"
                                                    onclick="showPassword('password')"></i></div>
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-10">
                                            <label for="new-pwd" class="form-label">New Password</label>
                                            <input type="password" id="new-pwd"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                name="new_password">
                                            <div style="margin-left:550px; position:absolute; margin-top:-30px"><i
                                                    class="bi bi-eye-slash" id="toggle_password2"
                                                    onclick="showPassword('new-pwd')"></i></div>
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-10">
                                            <label for="con-pwd" class="form-label">Confirm Password</label>
                                            <input type="password" id="con-pwd"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                value="" name="new_password_confirmation">
                                            <div style="margin-left:550px; position:absolute; margin-top:-30px"><i
                                                    class="bi bi-eye-slash" id="toggle_password3"
                                                    onclick="showPassword('con-pwd')"></i></div>
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
                </div>
            </div>

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
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
