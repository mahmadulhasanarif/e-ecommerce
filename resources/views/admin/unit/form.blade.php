@extends('admin.master')

@section('content')
    <form class="col-lg-6 col-md-8 col-10 mx-auto text-center" method="POST" action="{{ url('unit/' . $unit->id) }}">
        @csrf
        @if ($unit->id)
            @method('put')
        @endif
        <h1 class="h6 mb-3">Unit From</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Unit Name:</label>
            <input type="text" name="name" id="inputEmail" value="{{ old('name', $unit->name) }}"
                class="form-control form-control-lg @error('name') is-invalid @else is-valid @enderror"
                placeholder="Unit Name" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">Unit title:</label>
            <input type="text" name="title" id="inputTitle" value="{{ old('title', $unit->title) }}"
                class="form-control form-control-lg @error('title') is-invalid @else is-valid @enderror"
                placeholder="Unit Title" required="" autofocus="">
        </div>


        <div class="form-group">
            <label for="inputPassword" class="sr-only">Unit Slug</label>
            <input type="text" name="slug" id="inputSlug" value="{{ old('slug', $unit->slug) }}"
                class="form-control form-control-lg  @error('name') is-invalid @else is-valid @enderror"
                placeholder="Unit Slug" required="">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">Unit Description:</label>
            <textarea name="description"
                class="form-control form-control-lg  @error('description') is-invalid @else is-valid @enderror"
                rows="3" placeholder="Product Description"
                required="">{{ old('description', $unit->description) }}</textarea>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        <p class="mt-5 mb-3 text-muted ">copyright © 2022</p>
    </form>
@endsection
