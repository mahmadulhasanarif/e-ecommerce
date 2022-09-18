@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><a style="float: right" href="{{ route('subcategory.create') }}" class="btn btn-primary">Add Subcategory</a></div>
                <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success " role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="10%" scope="col">SL NO</th>
                                <th scope="col" width="10%">Category</th>
                                <th scope="col" width="10%">Subcategory</th>
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="25%">Description</th>
                                <th scope="col" width="15%">Image</th>
                                <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $subcategory)
                                <tr>
                                <th scope="row">{{ $subcategories->firstItem()+$loop->index }}</th>
                                <td>{{ $subcategory->Category->name }}</td>
                                <td>{{ $subcategory->name }}</td>
                                <td>{{ $subcategory->title }}</td>
                                <td>{{ $subcategory->description }}</td>
                                <td><img src="{{ asset($subcategory->image) }}" width="120px" height="80px"></td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('subcategory.edit',$subcategory->id) }}">Edit</a>
                                    <a class="btn btn-danger"  href="{{ route('subcategory.destroy',$subcategory->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $subcategories->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection