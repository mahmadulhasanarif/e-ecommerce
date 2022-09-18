
@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Edit Shiping</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('shiping.update',$shiping->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label"><b>Name</b></label>
                                    <input type="text" value="{{ old('name', $shiping->name) }}" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" name="name">
                                    @error('name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label"><b>Email</b></label>
                                    <input type="text" value="{{ old('email', $shiping->email) }}" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email">
                                    @error('email')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><b>Address</b></label>
                                    <input type="text" value="{{ old('address', $shiping->address) }}" placeholder="Enter Address" class="form-control @error('address') is-invalid @enderror" name="address">
                                    @error('address')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><b>phone</b></label>
                                    <input type="text" value="{{ old('phone', $shiping->phone) }}" placeholder="Enter Your phone number" class="form-control @error('phone') is-invalid @enderror" name="phone">
                                    @error('phone')
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