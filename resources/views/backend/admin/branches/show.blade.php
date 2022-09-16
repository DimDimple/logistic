@extends('backend.admin.layouts.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mt-4">
                <div class="row">
                    <div class="pull-left">
                        <h3> Show Branch Info ID: {{ $branch->id }}</h3>
                    </div>
                </div><br />

                <div class="card radius-15 w-100 p-3">
                    <div class="card-body" style="font-size: 18px">

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Branch name:</strong>
                                    {{ $branch->b_name }}
                                </div>
                                <hr>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Manager name:</strong>
                                    {{ $branch->user->name }}
                                </div>
                                <hr>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Phone Number:</strong>
                                    {{ $branch->user->phone }}
                                </div>
                                <hr>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {{ $branch->user->email }}
                                </div>
                                <hr>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Password:</strong>
                                    {{$branch->user->password}}
                                </div>
                                <hr>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Location:</strong>
                                    {{ $branch->location->province}}
                                </div>
                                <hr>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Created Date:</strong>
                                    {{ date('d-m-Y', strtotime($branch->created_at)) }}
                                </div>
                                <hr>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Status:</strong>
                                    {{ $branch->status }}
                                </div>
                                <hr>
                            </div>
                            <div class="pull-right p-1">
                                <a class="btn btn-info" href="{{ route('branch.index') }}" > Back</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection


