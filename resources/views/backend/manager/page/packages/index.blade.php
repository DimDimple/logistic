@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row justify-content-center" style="margin: 2% 4%">
        <div class="col-12">
            <h2 class="mb-0">Fill User</h2>
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert bg-light text-dark" style="height:45px">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="text-right" style="padding: 20px font-size: 2em">
                        <a type="button" class="btn btn-primary float-end" href="/manager/packages/create">
                            Create New Package</a>
                    </div>


                    <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Sender Phone Number</th>
                                <th class="text-center">Receiver Phone Number</th>
                                <th class="text-center">Package Value</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Shipping</th>
                                <th class="text-center">Actions</th>

                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($packages as $package)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center">{{ $package->sender_phone }}</td>
                                    <td class="text-center">{{ $package->receiver_phone }}</td>
                                    <td class="text-center">{{ $package->package_value }} $ </td>
                                    <td class="text-center">{{ $package->quantity }}</td>
                                    <td class="text-center">{{ $package->shipping }} $ </td>
                                    <td class="text-center">
                                        <form action="{{ route('packages.destroy', $package->id) }}" method="POST">

                                            <a class="btn btn-success btn-rounded waves-effect waves-light"
                                                href="{{ route('packages.show', $package->id) }}">Detail</a>

                                            <a class="btn btn-info btn-rounded waves-effect waves-light"
                                                href="{{ route('packages.edit', $package->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-danger btn-rounded waves-effect waves-light">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="float-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                    {{ $packages->links() }}
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
