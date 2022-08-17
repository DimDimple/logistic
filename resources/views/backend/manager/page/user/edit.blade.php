@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h2 class="mb-0">Edit User</h2>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="name" id="form7Example1" value="{{ $user->name }}" class="form-control" name="name"/>
                                    <label class="form-label" for="form7Example1">Name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="email" id="form7Example2" value="{{ $user->email }}" class="form-control" name="email" />
                                    <label class="form-label" for="form7Example2">Email</label>
                                </div>
                            </div>
                        </div>
                        <!-- price and quantity input -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example1" value="{{ $user->password }}" class="form-control" name="password"/>
                                    <label class="form-label" for="form7Example1">Password</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input disabled type="text" id="form7Example2" value="{{ $user->type}}" class="form-control" name="type" />
                                    <label class="form-label" for="form7Example2">Position</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
                        style="margin-left: 80%">
                        Submit
                    </button> 
                    <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
                    
                    </form>

                   
                </div>
            </div>
        </div>
    </div>
@endsection
