@extends('layouts.dashboard.userprofile')

@section('content')
    <section class="py-5 my-5">
        <div class="container">
            <h1 class="mb-5">Account Setting</h1>
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right">
                    <div class="p-4">
                        <!-- To update profile -->
                        <form action="{{ route('home') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="img-circle text-center mb-3">
                                <input type="file" name="image" accept="images/*" onchange="loadFile(event)"
                                    style="position: absolute; opacity: 0; cursor: pointer; width: 7.5%; height: 15.5%; border: 1px solid; z-index: 10">
                                {{-- <img src="img/pf.png" alt="Image"cc> --}}
                                @if (Auth::user()->image)
                                    <img src="{{ asset('/storage/images/' . Auth::user()->image) }}" alt="profile"
                                        style=" height: 80px;
                                width: 80px;
                                border-radius: 50%;
                                object-fit: cover;">
                                @endif
                            </div>
                            <h4 class="text-center"> {{ Auth::user()->name }}</h4>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab"
                            aria-controls="account" aria-selected="true">
                            <i class="fa fa-home text-center mr-1"></i> Account
                        </a>
                        <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab"
                            aria-controls="password" aria-selected="false">
                            <i class="fa fa-key text-center mr-1"></i> Password
                        </a>
                    </div>
                </div>
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <h3 class="mb-4">Edit Profile</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div>

                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            </form>
