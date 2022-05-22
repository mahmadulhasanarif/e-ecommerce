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
                <div class="col-md-12">
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
                                            <td><img src="{{Storage::url($category->image)}}" width="120px" height="80px" alt=""></td>
                                            <td>
                                                @if ($category->status == 1)
                                                <span class="label label-success">Active</span>
                                                @else
                                                <span class="label label-danger">Deactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $category->created_at }}</td>

                                            <td>
                                                <button class="btn btn-sm dropdown-toggle more-horizontal"
                                                    type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <form action="{{ url('category/' . $category->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class=" btn btn-outline-danger ">Remove</button>
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

    