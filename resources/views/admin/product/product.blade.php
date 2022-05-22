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
                        <h2 class="h3 mb-0 page-title">Product Table</h2>
                        <p class="card-text">eCommerce Product table </p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('product.create') }}" class="btn btn-primary"><span
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
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th style="width: 2%"></th>
                                            <th style="width: 3%">Code</th>
                                            <th style="width: 7%">Product</th>
                                            <th style="width: 8%">Price</th>
                                            <th style="width: 5%">category</th>
                                            <th style="width: 5%">Sub category</th>
                                            <th style="width: 10%">Slug</th>
                                            <th style="width: 13%">Description</th>
                                            <th style="width: 25%">Image</th>
                                            <th style="width: 5%">Status</th>
                                            <th style="width: 7%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            @php
                                                $product['file'] = explode('|', $product->file);
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox">
                                                    </div>
                                                </td>
                                                <td>{{ $product->code }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>&#2547 {{ $product->price }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>{{ $product->subcategory->name }}</td>
                                                <td>{{ $product->slug }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>
                                                    @foreach ($product->file as $images)
                                                        <img src="{{ asset('/image/' . $images) }}" height="40px"
                                                            width="50px" width="100px">
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($product->status == 1)
                                                    <span class="label label-success">Active</span>
                                                @else
                                                    <span class="label label-danger">Deactive</span>
                                                @endif  
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <form action="{{ url('product/' . $product->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button class=" btn btn-outline-danger ">Remove</button>
                                                            <a class="btn btn-outline-warning"
                                                                href="{{ url('product/' . $product->id) }}">View</a>
                                                            @if ($product->status == 1)
                                                                <input data-id="{{ $product->id }}" class="toggle-class"
                                                                    type="checkbox" data-onstyle="success"
                                                                    data-offstyle="danger" data-toggle="toggle"
                                                                    data-on="Active" data-off="InActive"
                                                                    {{ $product->status ? 'checked' : '' }}>
                                                            @else
                                                                <input data-id="{{ $product->id }}" class="toggle-class"
                                                                    type="checkbox" data-onstyle="success"
                                                                    data-offstyle="danger" data-toggle="toggle"
                                                                    data-on="InActive" data-off="Active"
                                                                    {{ $product->status ? 'checked' : '' }}>
                                                            @endif
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
