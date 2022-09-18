@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Edit Unit</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('unit.update', $unit->id) }}">
                                @csrf
                            
                                <div class="form-group">
                                    <label for="inputEmail" class="sr-only"><small>Unit Name:</small></label>
                                    <input type="text" name="name" value="{{ old('name', $unit->name) }}" class="form-control form-control-sm @error('name') is-invalid @else is-valid @enderror"
                                        placeholder="Unit Name">
                                        @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                </div>
                        
                                <div class="form-group">
                                    <label for="inputEmail" class="sr-only"><small>Unit title:</small></label>
                                    <input type="text" name="title"  value="{{ old('title', $unit->title) }}" class="form-control form-control-sm @error('title') is-invalid @else is-valid @enderror"
                                        placeholder="Unit Title">
                                        @error('title')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                </div>
                        
                                <div class="form-group">
                                    <label for="inputEmail" class="sr-only"><small>Unit Description:</small></label>
                                    <textarea name="description" rows="4" placeholder="Enter description" class="form-control form-control-sm
                                      @error('description') is-invalid @else is-valid @enderror">{{ old('description', $unit->description) }}</textarea>
                                        @error('description')
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