@extends('admin.master')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <h1 class="h3 mb-2 text-gray-800" style="margin-right: -202px; margin-left: 91px">Product Details Page</h1>
        <div class="card shadow mb-4" style="margin-left: 89px; border-right-width: 3px">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="margin-top: -14px;">
                    <table class="table table-bordered" style="margin-top: 6px" id="dataTable" width="71%" cellspacing="0">
                        <thead>

                            <tr>
                                <th>Product Name: </th>
                                <td>{{ $product->name }}</td>
                            </tr>

                            <tr>
                                <th>Product Price: </th>
                                <td>{{ $product->price }}</td>
                            </tr>

                            <tr>
                                <th>Category Name: </th>
                                <td>{{ $product->category->name }}</td>
                            </tr>

                            <tr>
                                <th>SubCategory Name: </th>
                                <td>{{ $product->subcategory->name }}</td>
                            </tr>
                            <tr>
                                <th>Brand Name: </th>
                                <td>{{ $product->brand->name }}</td>
                            </tr>
                            <tr>
                                <th>Unit Name: </th>
                                <td>{{ $product->unit->name }}</td>
                            </tr>

                            <tr>
                                <th>Product Color: </th>
                                <td>{{ implode(',', Json_decode($product->color->color)) }}</td>
                            </tr>

                            <tr>
                                <th>Product Size: </th>
                                <td>{{ implode(',', Json_decode($product->size->size)) }}</td>
                            </tr>

                            <tr>
                                <th>Product Price</th>
                                <td>{{ $product->price }}</td>
                            </tr>

                            <tr>
                                <th>Description</th>
                                <td>{{ $product->description }}</td>
                            </tr>

                            <tr>
                                <th>Date</th>
                                <td>{{ $product->created_at }}</td>
                            </tr>
                        
                            @php
                                $product['image'] = explode('|', $product->image);
                            @endphp

                            <tr>
                                <th>Image</th>
                                <td>
                                    @foreach ($product->image as $images)
                                        <img src="{{ asset('/images/product/' . $images) }}" height="150px" width="200px">
                                    @endforeach
                                </td>
                            </tr>
                           


                        </thead>
                        <a class="btn btn-warning" href="{{ route('product.edit',$product->id ) }}">Edit</a>
                        <a class="btn btn-danger"  href="{{ route('product.destroy',$product->id) }}">Delete</a>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
