@extends('layouts.edit_pf')

@section('edit_pf')
    <div class="container rounded bg-white mt-5">
        <div class="row covered">
            <div class="col-md-4 border-right">
                <form action="{{ route('profile.upload') }}"
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


            <form action="{{ route('profile.update', Auth::user()->id) }}" class="col-md-8" method="POST">
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

                <div class="p-3 py-5">
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
                            <input type="text" id="Username" class="form-control" placeholder="first name"
                                name="name" value="{{ Auth::user() ? Auth::user()->name : '' }}">
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
                    <div class="mt-5 text-right"><button class="btn btn-success profile-button" type="submit">Save
                            Changes</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
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
