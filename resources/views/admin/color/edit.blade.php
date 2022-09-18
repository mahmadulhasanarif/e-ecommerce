@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Edit Color</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('color.update',$color->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label"><b><small>Color</small></b></label>
                                    <input type="text" value="{{ implode(',',json_decode($color->color)) }}" placeholder="Enter Color" class="form-control @error('color') is-invalid @enderror" name="color">
                                    @error('color')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-outline-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection