@extends('admin.master')

@section('content')
    <form class="col-lg-6 col-md-8 col-10 mx-auto text-center" method="POST" action="{{ url('size/' . $size->id) }}">
        @csrf
        @if ($size->id)
            @method('put')
        @endif
        <h1 class="h6 mb-3"> Product Size From</h1>
        <div class="form-group">
            <label for="inputSize" class="sr-only">Size:</label>
            <span class="btn btn-primary"> 
                <input  type="text" id="input" data-role="tagsinput" name="size" value="{{implode(',', Json_decode($size->size))}}" placeholder="Product size">
            </span>
        </div>



        <button class="btn btn-primary" type="submit">Submit</button>
        <p class="mt-5 mb-3 text-muted ">copyright © 2022</p>
    </form>
@endsection

