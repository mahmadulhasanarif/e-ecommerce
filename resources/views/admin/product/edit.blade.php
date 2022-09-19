@extends('admin.master')

@section('content')
<div class="py-12">
    <div class="row mt-3">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="container">    
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-header">Product Edit</div>
                    <form method="POST" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $product->image }}">
                        <div class="form-group">
                            <label for="inputEmail"><small>Code</small></label>
                            <input type="text" name="code" value="{{ old('code', $product->code) }}" class="form-control form-control-sm @error('code') is-invalid @enderror"
                                placeholder="Enter Code">
                        </div>
        
                        <div class="form-group">
                            <label for="inputEmail"><small>Product Name:</small></label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                placeholder="Enter Product Name">
                        </div>
        
                        <div class="form-group">
                            <label for="inputEmail"><small>Product Price:</small></label>
                            <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control form-control-sm @error('price') is-invalid @enderror"
                                placeholder="Enter Product Price">
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group-sm">
                                    <select class="form-control form-control-sm mb-2 select2 @error('cat_id') is-invalid @enderror" name="cat_id">
                                        <option >Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->cat_id ? 'selected': '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group-sm">
                                    <select class="form-control form-control-sm  mb-2 select2 @error('subcat_id') is-invalid  @enderror" name="subcat_id">
                                        <option >Select Sub Category</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcat_id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group-sm">
                                    <select
                                        class="form-control form-control-sm mb-2 select2 @error('brand_id') is-invalid @enderror"
                                        name="brand_id">
                                        <option disabled>Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected':'' }}>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group-sm">
                                    <select class="form-control form-control-sm mb-2 select2 @error('color_id') is-invalid @enderror"
                                        name="color_id">
                                        <option disabled>Select Color</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}" {{ $color->id == $product->color_id ? 'selected': '' }}>
                                                {{ implode(',',Json_decode($color->color)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group-sm">
                                    <select class="form-control form-control-sm mb-2 select2 @error('unit_id') is-invalid @enderror"
                                        name="unit_id" id="simple-select2">
                                        <option disabled>Select Unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}" {{ $unit->id == $product->unit_id ? 'selected': '' }}>{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group-sm">
                                    <select class="form-control form-control-sm mb-2 @error('size_id') is-invalid @enderror" name="size_id">
                                        <option disabled>Select Size</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}" {{ $size->id == $product->size_id ? 'selected': '' }}>
                                               {{ implode(',',Json_decode($size->size)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail"><small>Description:</small></label>
                            <textarea name="description" 
                                class="form-control @error('description') is-invalid @enderror" rows="4"
                                placeholder="Sub Category Description">{{ old('description', $product->description) }}</textarea>
                        </div>
        
        
                        <div class="mb-2">
                            @php
                                $product['image'] = explode('|', $product->image);
                            @endphp
                            @foreach ($product['image'] as $images)
                            <img src="{{ asset('/images/product/' . $images) }}" height="150px" width="200px">
                            @endforeach
                        </div>
        
                        <div class="form-group">
                            <label for="inputImagae" class="sr-only">Image:</label>
                            <input type="file"  name="image[]" multiple="multiple" class="form-control form-control-sm  @error('image') is-invalid @enderror">
                        </div>
        
                        <button class="btn btn-outline-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

</div>
</div>

@endsection
