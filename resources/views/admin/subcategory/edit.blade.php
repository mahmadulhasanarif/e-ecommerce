@extends('admin.master')
@section('content')
<div class="py-12 mt-4">
    <div class="container">
        
        <div class="row " >
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Create Subcat</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="inputCategory"><small>Category Name:</small></label>
                                    <select id="category-select" name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option selected="">Select Category Name</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><b><small>Subcategory Name</small></b></label>
                                    <input type="text" placeholder="Enter subcat name" value="{{ old('name', $subcategory->name) }}" class="form-control @error('name') is-invalid @enderror" name="name">
                                    @error('name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><b><small>title</small></b></label>
                                    <input type="text" placeholder="Enter about title" value="{{ old('title', $subcategory->title) }}" class="form-control @error('title') is-invalid @enderror" name="title">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputCategory"><small>Description</small></label>
                                    <textarea type="text" rows="3" placeholder="Enter description"  class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $subcategory->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputCategory" class="sr-only">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid  @enderror" value="{{ old('image', $subcategory->image) }}" name="image">
                                    @error('image')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            
                                
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection