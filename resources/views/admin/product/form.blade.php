@extends('admin.master')

@section('content')
    <div class="row justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ url('product/' . $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @if ($product->id)
                                @method('put')
                            @endif
                            <h1 class="h5 mb-3 text-center">Product From</h1>

                            <div class="form-group-sm">
                                <input type="text" name="code" id="inputTitle" value="{{ old('code', $product->code) }}"
                                    class="form-control mb-2  @error('code') is-invalid @else is-valid @enderror"
                                    placeholder="Product Code" required="" autofocus="">
                            </div>



                            <div class="form-group-sm">
                                <input type="text" name="name" id="inputEmail" value="{{ old('name', $product->name) }}"
                                    class="form-control mb-2 @error('name') is-invalid @else is-valid @enderror"
                                    placeholder="Product Name" required="" autofocus="">
                            </div>

                            <div class="form-group-sm">
                                <input type="text" name="slug" id="inputSlug" value="{{ old('slug', $product->slug) }}"
                                    class="form-control mb-2  @error('slug') is-invalid @else is-valid @enderror"
                                    placeholder="Product Slug" required="">
                            </div>

                            <div class="form-group-sm">
                                <input type="text" name="price" id="inputSlug" value="{{ old('price', $product->price) }}"
                                    class="form-control mb-2  @error('price') is-invalid @else is-valid @enderror"
                                    placeholder="Product Price" required="">
                            </div>
                            <div class="form-group-sm">
                                <select
                                    class="form-control mb-2 select2 @error('cat_id') is-invalid @else is-valid @enderror"
                                    name="cat_id" id="simple-select2">
                                    <option selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group-sm">
                                <select
                                    class="form-control  mb-2 select2 @error('subcat_id') is-invalid @else is-valid @enderror"
                                    name="subcat_id" id="simple-select2">
                                    <option selected>Select Sub Category</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group-sm">
                                <select
                                    class="form-control mb-2 select2 @error('brand_id') is-invalid @else is-valid @enderror"
                                    name="brand_id" id="simple-select2">
                                    <option selected>Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group-sm">
                                <select
                                    class="form-control mb-2 select2 @error('color_id') is-invalid @else is-valid @enderror"
                                    name="color_id" id="simple-select2">
                                    <option selected>Select Color</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">
                                            @foreach (Json_decode($color->color) as $colors)
                                                {{ $colors }}
                                            @endforeach
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group-sm">
                                <select
                                    class="form-control mb-2 select2 @error('unit_id') is-invalid @else is-valid @enderror"
                                    name="unit_id" id="simple-select2">
                                    <option selected>Select Unit</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group-sm">
                                <select
                                    class="form-control mb-2 select2 @error('size_id') is-invalid @else is-valid @enderror"
                                    name="size_id" id="simple-select2">
                                    <option selected>Select Size</option>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}">
                                            @foreach (Json_decode($size->size) as $sizess)
                                                {{ $sizess }}
                                            @endforeach
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="example-textarea">Text area</label>
                                <textarea class="form-control @error('description') is-invalid @else is-valid @enderror" name="description"
                                    id="example-textarea"
                                    rows="3"> {{ old('description', $product->description) }}</textarea>
                            </div>

                            <div class="user-image mb-3 text-center">
                                <div class="imgPreview"> </div>
                            </div>
                            
                            <div class="custom-file">
                                <input type="file" name="file[]" class="custom-file-input" id="images" multiple="multiple">
                                <label class="custom-file-label" for="images">Choose image</label>
                            </div>

                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
