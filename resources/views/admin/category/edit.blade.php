@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $category->image }}">
                        <div class="mb-3">
                            <label class="form-label"><b>Category Name</b></label>
                            <input type="text"  class="form-control @error('name') is-invalid @else is-valid @enderror" name="name" value="{{ old('name', $category->name) }}">
                            @error('name')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset($category->image) }}" width="300px" height="200px">
                            <label class="form-label"><b>Image</b></label>
                            <input type="file"  class="form-control @error('image') is-invalid @else is-valid @enderror" name="image" value="{{ old('image', $category->image) }}">
                            @error('image')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
@endsection