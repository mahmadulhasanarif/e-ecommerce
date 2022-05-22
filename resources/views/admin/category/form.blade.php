@extends('admin.master')

@section('content')
    <form class="col-lg-7 col-md-6 col-6 mx-auto text-center" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
        @csrf
        <h1 class="h6 mb-3" style="margin-top: -8px">Category From</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Category Name:</label>
            <input type="text" name="name" id="inputEmail"
                class="form-control form-control-lg @error('name') is-invalid @else is-valid @enderror"
                placeholder="Category Name" required="">
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Category Slug</label>
            <input type="text" name="slug" id="inputSlug"
                class="form-control form-control-lg @error('slug') is-invalid @else is-valid @enderror"
                placeholder="Category Slug" required="">
        </div>

        <div class="form-group">
            <label for="inputImagae" class="sr-only">Category Image:</label>
            <input type="file" name="image" id="inputImage"
                class="form-control form-control-lg  @error('image') is-invalid @else is-valid @enderror">
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        <p class="mt-5 mb-3 text-muted">copyright © 2022</p>
    </form>
@endsection
