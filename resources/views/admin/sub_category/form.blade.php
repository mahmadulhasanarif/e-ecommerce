@extends('admin.master')

@section('content')
    <form class="col-lg-7 col-md-8 col-10 mx-auto text-center" method="POST"
        action="{{ url('subcategory/' . $subcategory->id) }}" enctype="multipart/form-data">
        @csrf
        @if ($subcategory->id)
            @method('put')
        @endif
        <h1 class="h6 mb-3">Sub-Category From</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">SubCategory Name:</label>
            <input type="text" name="name" id="inputEmail" value="{{ old('name', $subcategory->name) }}"
                class="form-control form-control-lg @error('name') is-invalid @else is-valid @enderror"
                placeholder="SubCategory Name" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">SubCategory title:</label>
            <input type="text" name="title" id="inputTitle" value="{{ old('title', $subcategory->title) }}"
                class="form-control form-control-lg @error('title') is-invalid @else is-valid @enderror"
                placeholder="SubCategory Title" required="" autofocus="">
        </div>

        <div class="form-group mb-3">
            <label for="inputCategory" class="sr-only">Category Name:</label>
            <select id="category-select" name="category_id"
                class="form-control form-control-lg  @error('category_id') is-invalid @else is-valid @enderror">
                <option selected="">Select Category Name</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="sr-only">Sub-Category Slug</label>
            <input type="text" name="slug" id="inputSlug" value="{{ old('slug', $subcategory->slug) }}"
                class="form-control form-control-lg  @error('name') is-invalid @else is-valid @enderror"
                placeholder="Category Slug" required="">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">SubCategory Description:</label>
            <textarea name="description"
                class="form-control form-control-lg  @error('description') is-invalid @else is-valid @enderror" rows="3"
                placeholder="Sub Category Description"
                required="">{{ old('description', $subcategory->description) }}</textarea>
        </div>
        @if ($subcategory->image)
            <img src="{{ $subcategory->image }}" alt="" width="100px" height="100px">
        @endif
        <div class="form-group">
            <label for="inputImagae" class="sr-only">SubCategory Image:</label>
            <input type="file" name="image" id="inputImage"
                class="form-control form-control-lg  @error('image') is-invalid @else is-valid @enderror">
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        <p class="mt-5 mb-3 text-muted ">copyright © 2022</p>
    </form>
@endsection
