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
                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" required parsley-type="email"
                                    name="email" placeholder="Enter a valid e-mail" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" required parsley-type="password"
                                    name="password" placeholder="Enter a valid password" />
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
    @endsection
