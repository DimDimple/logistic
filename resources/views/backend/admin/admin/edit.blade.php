@extends('backend.admin.layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">EDIT ADMIN ID : {{ $admin->id }}</h4><br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Oops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.update', $admin->id) }}" class="custom-validation" method="POST">
                        @csrf
                        @method('PUT')
                        <div class=" row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="name" name="name"
                                    placeholder="name" value="{{ $admin->name}}">
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" required parsley-type="email"
                                    name="email" placeholder="Enter a valid e-mail" value="{{ $admin->email}}"/>
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="phone" required parsley-type="phone"
                                    name="phone" placeholder="Enter a valid phone number" value="{{ $admin->phone}}" />
                            </div>
                        </div>
                     
                        <div class="mb-0 float-end">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Save Changes
                                </button>
                                <a class="btn btn-secondary " href="{{ route('admin.index') }}"> Back</a>
                                {{-- <a class="btn btn-secondary" href="{{ route('employees.index') }}"> Back</a> {{ $branch->location_id == $location->id ? "selected" : "true" }}--}}

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    @endsection
