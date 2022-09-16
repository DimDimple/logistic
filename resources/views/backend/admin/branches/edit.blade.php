@extends('backend.admin.layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">EDIT BRANCH'S ID : {{ $branch->id }}</h4><br>
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
                    <form action="{{ route('branch.update', $branch->id) }}" class="custom-validation" method="POST">
                        @csrf
                        @method('PUT')
                        <div class=" row mb-3">
                            <label for="b_name" class="col-sm-2 col-form-label">Branch Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="b_name" name="b_name"
                                    placeholder="Type Branch name" value="{{ $branch->b_name}}">
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Manager Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="name" name="name"
                                    placeholder="Type Manager name" value="{{ $branch->user->name}}">
                            </div>
                        </div>

                        <div class=" row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" required parsley-type="email"
                                    name="email" placeholder="Enter a valid e-mail" value="{{ $branch->user->email}}"/>
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="phone" required parsley-type="phone"
                                    name="phone" placeholder="Enter a valid phone number" value="{{ $branch->user->phone}}" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="address" class="col-sm-2 col-form-label">Location</label>
                            <div class="col-sm-10">
                                <select class="form-select form-select-lg mb-3" name="location_id"
                                aria-label=".form-select-lg example">
                                {{-- <option selected value="{{ $branch->location_id }}">{{ $branch->location->province }}</option> --}}
                                @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ $branch->location_id == $location->id ? "selected" : "" }}>{{ $location->province }}</option>
                                    {{-- <option value="{{ $location->id }}">{{ $location->province }}</option> --}}
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class=" row mb-3">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-4">
                                    <select class="form-select form-select-lg mb-3" name="status"
                                        aria-label=".form-select-lg example">
                                        {{-- <option>{{ $branch->status }}</option> --}}
                                        <option value="Open" {{ $branch->status == "Open" ? "selected" : "true" }}>Open</option>
                                        <option value="Closed" {{ $branch->status == "Closed" ? "selected" : "true" }}>Closed</option>
                                    </select>
                                </div>
                        </div>
                        <div class="mb-0 float-end">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Save Changes
                                </button>
                                <a class="btn btn-secondary " href="{{ route('branch.index') }}"> Back</a>
                                {{-- <a class="btn btn-secondary" href="{{ route('employees.index') }}"> Back</a> {{ $branch->location_id == $location->id ? "selected" : "true" }}--}}

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    @endsection
