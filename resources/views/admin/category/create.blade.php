@extends('admin.master')
@section('content')


<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="mb-3">
                                <label class="form-label"><b>Category Name</b></label>
                                <input type="text" placeholder="Enter Category" class="form-control @error('name') is-invalid  @enderror" name="name">
                                @error('name')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><b>Image</b></label>
                                <input type="file" class="form-control @error('image') is-invalid  @enderror" name="image">
                                @error('image')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

@endsection