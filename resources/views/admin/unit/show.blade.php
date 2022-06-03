@extends('admin.master')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <h1 class="h3 mb-2 text-gray-800" style="margin-right: -202px; margin-left: 91px">Unit Product Details Page</h1>
        <div class="card shadow mb-4" style="margin-left: 89px; border-right-width: 3px">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Unit Product Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="margin-top: -14px;">
                    <table class="table table-bordered" style="margin-top: 6px" id="dataTable" width="71%" cellspacing="0">
                        <thead>

                            <tr>
                                <th>Product Name: </th>
                                <td>{{ $unit->name }}</td>
                            </tr>

                            <tr>
                                <th>Product Title: </th>
                                <td>{{ $unit->title }}</td>
                            </tr>

                            <tr>
                                <th>Product Slug: </th>
                                <td>{{ $unit->slug }}</td>
                            </tr>

                           
                            <tr>
                                <th>Description</th>
                                <td>{{ $unit->description }}</td>
                            </tr>

                            <tr>
                                <th>Date</th>
                                <td>{{ $unit->created_at }}</td>
                            </tr>
                            <form action="{{ url('unit/' . $unit->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                                <a class="btn btn-warning" href="{{ url('unit/' . $unit->id . '/edit') }}">Edit</a>
                            </form>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
