@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
        <div class="card">
            <div class="card-header"><a style="float: right" href="{{ route('brand.create') }}" class="btn btn-primary">Add Brand</a></div>
            <div class="card-body">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                            <th width="10%" scope="col">SL NO</th>
                            <th width="10%" scope="col">Brand Name</th>
                            <th width="15%" scope="col">Brand Title</th>
                            <th width="35%" scope="col">Description</th>
                            <th width="15%" scope="col">Created At</th>
                            <th width="15%" scope="col"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                            <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->title }}</td>
                            <td>{{ $brand->description }}</td>
                            <td>{{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('brand.edit',$brand->id) }}">Edit</a>
                                <a class="btn btn-danger" href="{{ route('brand.destroy',$brand->id) }}">Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection