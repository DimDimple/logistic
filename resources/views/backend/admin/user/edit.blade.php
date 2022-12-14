@extends('backend.admin.layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9 mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">EDIT USER ID : {{ $user->id }}</h4>
                        <div class="float-end">
                            <a href="{{ route('user.resetPassword', $user->id) }}">
                                <button type="button" class="btn btn-info btn-sm-rounded waves-effect waves-light">
                                    Resset Password</button>
                            </a>

                        </div>
                    </div>
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
                    <form action="{{ route('user.update', $user->id) }}" class="custom-validation" method="POST">
                        @csrf
                        @method('PUT')
                        <div class=" row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="name" name="name" placeholder="name"
                                    value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" required parsley-type="email"
                                    name="email" placeholder="Enter a valid e-mail" value="{{ $user->email }}" />
                            </div>
                        </div>

                        <div class=" row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" required parsley-type="phone"
                                    name="phone" placeholder="Enter a valid phone number"
                                    value="{{ $user->phone }}" />
                            </div>
                        </div>

                        <div class="mb-0 float-end">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Save Changes
                                </button>
                                <a class="btn btn-secondary " href="{{ route('user.index') }}"> Back</a>
                                {{-- <a class="btn btn-secondary" href="{{ route('employees.index') }}"> Back</a> {{ $branch->location_id == $location->id ? "selected" : "true" }} --}}

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div> <!-- end col -->
@endsection
