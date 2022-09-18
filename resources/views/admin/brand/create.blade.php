@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('brand.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label"><b><small>Brand Name</small></b></label>
                        <input type="text" placeholder="Enter Brand name" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><small>Brand Title</small></label>
                        <input type="text" placeholder="Enter Brand title" class="form-control @error('title') is-invalid @enderror" name="title">
                        @error('title')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><small>Description</small></label>
                        <textarea name="description" class="form-control @error('title') is-invalid @enderror" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
@endsection