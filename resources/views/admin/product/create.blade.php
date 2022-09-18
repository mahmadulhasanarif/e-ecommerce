@extends('admin.master')

@section('content')
<div class="py-12">
    <div class="row mt-3">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="container">    
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-header">Product Store</div>
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputEmail"><small>Code</small></label>
                            <input type="text" name="code" class="form-control form-control-sm @error('code') is-invalid @enderror"
                                placeholder="Enter Code">
                        </div>
        
                        <div class="form-group">
                            <label for="inputEmail"><small>Product Name:</small></label>
                            <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                placeholder="Enter Product Name">
                        </div>
        
                        <div class="form-group">
                            <label for="inputEmail"><small>Product Price:</small></label>
                            <input type="text" name="price" class="form-control form-control-sm @error('price') is-invalid @enderror"
                                placeholder="Enter Product Price">
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group-sm">
                                    <select class="form-control form-control-sm mb-2 select2 @error('cat_id') is-invalid @enderror" name="cat_id">
                                        <option disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group-sm">
                                    <select class="form-control form-control-sm  mb-2 select2 @error('subcat_id') is-invalid  @enderror" name="subcat_id">
                                        <option disabled>Select Sub Category</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
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
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group-sm">
                                    <select
                                        class="form-control form-control-sm mb-2 select2 @error('color_id') is-invalid @enderror"
                                        name="color_id">
                                        <option disabled>Select Color</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">
                                                @foreach (Json_decode($color->color) as $colors)
                                                    {{ $colors }}
                                                @endforeach
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
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group-sm">
                                    <select class="form-control form-control-sm mb-2 @error('size_id') is-invalid @enderror" name="size_id">
                                        <option disabled>Select Size</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">
                                                @foreach (Json_decode($size->size) as $sizess)
                                                    {{ $sizess }}
                                                @endforeach
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
                                placeholder="Sub Category Description"></textarea>
                        </div>
        
                        <div class="form-group">
                            <label for="inputImagae">Image:</label>
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

    