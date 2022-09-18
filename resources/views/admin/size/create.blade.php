@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Add Size</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('size.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label"><small><b>Size</b></small></label>
                                    <input type="text"placeholder="Enter size" class="form-control @error('size') is-invalid @enderror"  name="size">
                                    @error('size')
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