@extends('admin.master')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">Admin Table</h2>
                        <p class="card-text">eCommerce Admin table </p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.create') }}" class="btn btn-primary"><span
                                class="fe fe-user-plus fe-12 mr-2"></span>Create</a>
                    </div>
                </div>

                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <div id="dataTable-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-fotter">
                                    <label class="searchs">Search:</label>
                                    <input type="search" placeholder="" aria-controls="dataTable-1"
                                        class="form-controls fomr-control-sm">
                                </div>
                                <table style="color: black" class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Description</th>
                                            <th>Possition</th>
                                            <th>Address</th>
                                            <th>Education</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox">
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->description }}</td>
                                                <td>{{ $admin->possition }}</td>
                                                <td>{{ $admin->Address }}</td>
                                                <td>{{ $admin->education }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($admin->image) }}" height="100px"
                                                        width="100px">
                                                </td>
                                                <td>{{ $admin->created_at }}</td>

                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <form action="{{ url('admin/' . $admin->id) }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button class=" btn btn-outline-danger ">Remove</button>
                                                            <a class="btn btn-outline-warning"
                                                                href="{{ url('admin/' . $admin->id . '/edit') }}">Edit</a>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection
