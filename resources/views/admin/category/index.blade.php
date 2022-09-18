@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header"><a style="float: right" href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a></div>
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
                            <th scope="col">SL NO</th>
                            <th scope="col">NAME</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created At</th>
                            <th scope="col"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                            <td>{{ $category->name }}</td>
                            <td><img src="{{ asset($category->image) }}" width="100px" height="80px"></td>
                            <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
                                <a class="btn btn-danger" href="{{ route('category.destroy',$category->id) }}">Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection