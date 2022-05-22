@extends('admin.master')

@section('content')
    <form class="col-lg-6 col-md-8 col-10 mx-auto text-center" method="POST" action="{{ url('brand/' . $brand->id) }}">
        @csrf
        @if ($brand->id)
            @method('put')
        @endif
        <h1 class="h6 mb-3">Brand Product From</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Brand Name:</label>
            <input type="text" name="name" id="inputEmail" value="{{ old('name', $brand->name) }}"
                class="form-control form-control-lg @error('name') is-invalid @else is-valid @enderror"
                placeholder="Product Name" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">Brand title:</label>
            <input type="text" name="title" id="inputTitle" value="{{ old('title', $brand->title) }}"
                class="form-control form-control-lg @error('title') is-invalid @else is-valid @enderror"
                placeholder="Product Title" required="" autofocus="">
        </div>


        <div class="form-group">
            <label for="inputPassword" class="sr-only">Brand Slug</label>
            <input type="text" name="slug" id="inputSlug" value="{{ old('slug', $brand->slug) }}"
                class="form-control form-control-lg  @error('name') is-invalid @else is-valid @enderror"
                placeholder="Product Slug" required="">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">Brand Description:</label>
            <textarea name="description"
                class="form-control form-control-lg  @error('description') is-invalid @else is-valid @enderror"
                rows="3" placeholder="Product Description"
                required="">{{ old('description', $brand->description) }}</textarea>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        <p class="mt-5 mb-3 text-muted ">copyright © 2022</p>
    </form>
@endsection
