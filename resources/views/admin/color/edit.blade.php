@extends('admin.master')

@section('content')
    <form class="col-lg-6 col-md-8 col-10 mx-auto text-center" method="POST" action="{{ url('color/' . $color->id) }}">
        @csrf
        @if ($color->id)
            @method('put')
        @endif
        <h1 class="h6 mb-3"> Product color From</h1>
        <div class="form-group">
            <label for="inputSize" class="sr-only">color:</label>
            <span class="btn btn-primary"> 
                <input  type="text" id="input" data-role="tagsinput" name="color" value="{{implode(',', Json_decode($color->color))}}" placeholder="Product color">
            </span>
        </div>



        <button class="btn btn-primary" type="submit">Submit</button>
        <p class="mt-5 mb-3 text-muted ">copyright © 2022</p>
    </form>
@endsection

