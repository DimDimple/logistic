@extends('backend.admin.layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-10 mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">EDIT BRANCH ID : {{ $branch->id }}</h4>
                        <div class="float-end">
                            <a href="{{ route('branch.resetPassword', $branch->user_id) }}">
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
                    <form action="{{ route('branch.update', $branch->id) }}" class="custom-validation" method="POST">
                        @csrf
                        @method('PUT')
                        <div class=" row mb-3">
                            <label for="b_name" class="col-sm-2 col-form-label">Branch Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="b_name" name="b_name"
                                    placeholder="Type Branch name" value="{{ $branch->b_name }}">
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Manager Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="name" name="name"
                                    placeholder="Type Manager name" value="{{ $branch->user->name }}">
                            </div>
                        </div>

                        <div class=" row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" required parsley-type="email"
                                    name="email" placeholder="Enter a valid e-mail" value="{{ $branch->user->email }}" />
                            </div>
                        </div>

                        <div class=" row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="phone" required parsley-type="phone"
                                    name="phone" placeholder="Enter a valid phone number"
                                    value="{{ $branch->user->phone }}" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="address" class="col-sm-2 col-form-label">Location</label>
                            <div class="col-sm-10">
                                <select class="form-select form-select-lg mb-3" name="location_id"
                                    aria-label=".form-select-lg example">
                                    {{-- <option selected value="{{ $branch->location_id }}">{{ $branch->location->province }}</option> --}}
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}"
                                            {{ $branch->location_id == $location->id ? 'selected' : '' }}>
                                            {{ $location->province }}</option>
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
                                    <option value="Open" {{ $branch->status == 'Open' ? 'selected' : 'true' }}>Open
                                    </option>
                                    <option value="Closed" {{ $branch->status == 'Closed' ? 'selected' : 'true' }}>Closed
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-0 float-end">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Save Changes
                                </button>
                                <a class="btn btn-secondary " href="{{ route('branch.index') }}"> Back</a>
                                {{-- <a class="btn btn-secondary" href="{{ route('employees.index') }}"> Back</a> {{ $branch->location_id == $location->id ? "selected" : "true" }} --}}

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
        {{-- <div class="col-4 mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="m-4">
                        <div class="row mb-3">
                            <h3 class="text-center">Reset Password</h3>
                        </div>
                        <div class="row mb-3">

                            <div class="input-group">
                                <input type="password" class="form-control" id="password" required parsley-type="password"
                                    name="password" placeholder="Enter a valid password" />
                                <div class="input-group-append">
                                    <button onclick="showPassword()" data-toggle="tooltip" id="toggle_password"
                                        data-original-title="Show/Hide Value"
                                        class="btn btn-outline-secondary border-grey height-35 toggle-password"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-12 d-flex justify-content-sm-between">
                                <button onclick="genPassword()" id="random_password"
                                    class="btn btn-primary col-sm-5">Generate</button>
                                <button onclick="copyPassword()" class="btn btn-warning col-sm-5">Copy</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
