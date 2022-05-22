@extends('admin.master')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="container-fluid" style="margin-top: -40px">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">Brand Product Table</h2>
                        <p class="card-text">eCommerce Brand table </p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('brand.create') }}" class="btn btn-primary"><span
                                class="fe fe-user-plus fe-12 mr-2"></span>Create</a>
                    </div>
                </div>

                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12" style="margin-top: -20px">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">#</th>
                                            <th style="width: 10%">ID</th>
                                            <th style="width: 12%">Name</th>
                                            <th style="width: 21%">Title</th>
                                            <th style="width: 20%">slug</th>
                                            <th style="width: 20%">Date</th>
                                            <th style="width: 12%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox">
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $brand->name }}</td>
                                                <td>{{ $brand->title }}</td>
                                                <td>{{ $brand->slug }}</td>
                                                <td>{{ $brand->created_at }}</td>


                                                <td class="center" style="float: center;">
                                                    <div class="row">
                                                        <div class="col p-1">
                                                                <a class="btn btn-info"
                                                                    href="{{ url('/brand/' . $brand->id . '/edit') }}">
                                                                    <i class="halflings-icon white edit"></i>
                                                                </a>
                                                        </div>

                                                        <div class="col p-1">
                                                            <a class="btn btn-info"
                                                                href="{{ url('/brand/' . $brand->id) }}">
                                                                <i class="halflings-icon white info"></i>
                                                            </a>
                                                    </div>

                                                        <div class="col p-1">
                                                            <form action="{{ url('brand/' . $brand->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger" id="delete">
                                                                    <i class="halflings-icon white trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
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
