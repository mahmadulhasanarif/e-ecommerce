@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        <div class="card mt-4">
            <div class="card-header"><a style="float: right" href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a></div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success " role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 5%">SL</th>
                                <th style="width: 12%">Product</th>
                                <th style="width: 10%">Price</th>
                                <th style="width: 9%">category</th>
                                <th style="width: 28%">Description</th>
                                <th style="width: 20%">Image</th>
                                <th style="width: 16%">Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    @php
                                        $product['image'] = explode('|', $product->image);
                                    @endphp
                                    <tr>
                                        <td>{{ $products->firstItem()+$loop->index }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>&#2547 {{ $product->price }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            @foreach ($product->image as $images)
                                                <img src="{{ asset('/images/product/' . $images) }}" height="40px"
                                                    width="50px" width="100px">
                                            @endforeach
                                        </td>

                                        <td>
                                            <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                                            <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">show</a>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection