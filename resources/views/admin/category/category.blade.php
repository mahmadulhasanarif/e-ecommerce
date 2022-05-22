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
                        <h2 class="h3 mb-0 page-title">Category Table</h2>
                        <p class="card-text">eCommerce Category table </p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('category.create') }}" class="btn btn-primary"><span
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
                                            <th></th>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td><img src="{{ Storage::url($category->image) }}" width="120px"
                                                        height="80px" alt=""></td>

                                                <td class="center">
                                                    @if ($category->status == 1)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Deactive</span>
                                                    @endif


                                                </td>
                                                <td class="center">
                                                    {{ \Carbon\Carbon::parse($category->created_at)->format('M d, Y, h:iA') }}
                                                </td>

                                                <td class="center" style="float: center;">
                                                    <div class="row">
                                                    <div class="col p-1">
                                                        @if ($category->status == 1)
                                                            <a class="btn btn-success"
                                                                href="{{ url('/category_status/' . $category->id) }}">
                                                                <i class="halflings-icon white thumbs-up"></i>
                                                            </a>
                                                        @else
                                                            <a class="btn btn-danger"
                                                                href="{{ url('/category_status/' . $category->id) }}">
                                                                <i class="halflings-icon white thumbs-down"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <div class="col  p-1">
                                                    <form action="{{ url('category/' . $category->id) }}" method="POST">
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
