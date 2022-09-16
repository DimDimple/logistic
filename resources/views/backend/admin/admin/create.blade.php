@extends('backend.admin.layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ADD NEW ADMIN</h4><br>

                    <form action="{{ route('admin.store') }}" class="custom-validation" method="POST">
                        @csrf
                        <div class=" row mb-3">
                            <label for="b_name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="name" name="name"
                                    placeholder="name">
                            </div>
                        </div>

                        <div class=" row mb-3">
                            <div class=" row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" required parsley-type="email"
                                        name="email" placeholder="Enter a valid e-mail" />
                                </div>
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>

                            <div class="col-sm-10">
                                <div class="input-group">

                                    <input type="password" name="password" id="password" autocomplete="off"
                                        placeholder="Must have at least 8 characters" class="form-control height-35 f-14">
                                    <div class="input-group-append">
                                        <button onclick="copyPassword()" data-toggle="tooltip" data-original-title="Show/Hide Value"
                                            class="btn btn-outline-secondary border-grey height-35 toggle-password">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-files" viewBox="0 0 16 16">
                                                <path
                                                    d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="input-group-append">
                                        <button onclick="showPassword()" data-toggle="tooltip" data-original-title="Show/Hide Value"
                                            class="btn btn-outline-secondary border-grey height-35 toggle-password"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </button>
                                    </div>


                                    <div class="input-group-append">
                                        <button onclick="genPassword()" id="random_password" type="button" data-toggle="tooltip"
                                            data-original-title="Generate Random Password"
                                            class="btn btn-outline-secondary border-grey height-35">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-shuffle" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5z" />
                                                <path
                                                    d="M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z" />
                                            </svg>
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="phone" required parsley-type="phone"
                                    name="phone" placeholder="Enter a valid phone number" />
                            </div>
                        </div>

                        <div class="mb-0 float-end">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
                                </button>
                                <a class="btn btn-secondary " href="{{ route('admin.index') }}"> Back</a>
                                {{-- <a class="btn btn-secondary" href="{{ route('employees.index') }}"> Back</a> --}}

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
        <script>
            var password = document.getElementById("password");
            const toggle_password = document.querySelector('#toggle_password');

            function genPassword() {
                var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@$ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                var passwordLength = 8;
                var password = "";
                for (var i = 0; i <= passwordLength; i++) {
                    var randomNumber = Math.floor(Math.random() * chars.length);
                    password += chars.substring(randomNumber, randomNumber + 1);
                }
                document.getElementById("password").value = password;
            }

            function copyPassword() {
                var copyText = document.getElementById("password");
                copyText.select();
                document.execCommand("copy");
            }

            function showPassword() {
                const password = document.getElementById("password");
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);

            }
        </script>
    @endsection
