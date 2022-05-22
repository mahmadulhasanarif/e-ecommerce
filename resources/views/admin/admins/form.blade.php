@extends('admin.master')

@section('content')
    <form class="col-lg-6 col-md-8 col-10 mx-auto text-center" method="POST" action="{{ url('admin/' . $admin->id) }}"
        enctype="multipart/form-data">
        @csrf
        @if ($admin->id)
            @method('put')
        @endif
        <h1 class="h6 mb-3">Admin From</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Admin Name:</label>
            <input type="text" name="name" id="inputEmail" value="{{ old('name', $admin->name) }}"
                class="form-control form-control-lg @error('name') is-invalid @else is-valid @enderror"
                placeholder="Enter Admin Name" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">Admin Email:</label>
            <input type="email" name="email" id="inputTitle" value="{{ old('email', $admin->email) }}"
                class="form-control form-control-lg @error('email') is-invalid @else is-valid @enderror"
                placeholder="Enter Admin Email" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">Admin Possition:</label>
            <input type="text" name="possition" id="inputTitle" value="{{ old('possition', $admin->possition) }}"
                class="form-control form-control-lg @error('possition') is-invalid @else is-valid @enderror"
                placeholder="Enter Admin Possition" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">Admin Possition:</label>
            <input type="text" name="address" id="inputTitle" value="{{ old('address', $admin->address) }}"
                class="form-control form-control-lg @error('address') is-invalid @else is-valid @enderror"
                placeholder="Enter Admin Address" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">Admin Possition:</label>
            <input type="text" name="education" id="inputTitle" value="{{ old('education', $admin->education) }}"
                class="form-control form-control-lg @error('education') is-invalid @else is-valid @enderror"
                placeholder="Enter Admin Qualification" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">Admin Description:</label>
            <textarea name="description"
                class="form-control form-control-lg  @error('description') is-invalid @else is-valid @enderror" rows="3"
                placeholder="Admin Description" required="">{{ old('description', $admin->description) }}</textarea>
        </div>
        @if ($admin->image)
            <img src="{{ Storage::url($admin->image) }}" alt="" width="100px" height="100px">
        @endif
        <div class="form-group">
            <label for="inputImagae" class="sr-only">Admin Image:</label>
            <input type="file" name="image" id="inputImage"
                class="form-control form-control-lg  @error('image') is-invalid @else is-valid @enderror">
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        <p class="mt-5 mb-3 text-muted ">copyright © 2022</p>
    </form>
@endsection
