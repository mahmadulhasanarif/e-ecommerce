@extends('admin.master')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title"> Product Color Table</h2>
                        <p class="card-text">eCommerce Product color table </p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('color.create') }}" class="btn btn-primary"><span
                                class="fe fe-user-plus fe-12 mr-2"></span>Create</a>
                    </div>
                </div>

                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <div id="dataTable-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-fotter">
                                    <label class="searchs">Search:</label>
                                    <input type="search" placeholder="" aria-controls="dataTable-1"
                                        class="form-controls fomr-control-sm">
                                </div>
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">#</th>
                                            <th style="width: 10%">ID</th>
                                            <th style="width: 45%">Color</th>
                                            <th style="width: 15%">Status</th>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($colors as $color)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox">
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="row">
                                                    @foreach (Json_decode($color->color) as $colors)
                                                            <ul class="col col-lg-4">
                                                                {{ $colors }}
                                                            </ul>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($color->status == 1)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ $color->created_at }}</td>

                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <form action="{{ url('color/' . $color->id) }}" method="POST">
                                                            @csrf
                                                            @method('delete')

                                                            <button type="submit"
                                                                class=" btn btn-outline-danger ">Remove</button>
                                                            <a class="btn btn-outline-warning"
                                                                href="{{ url('color/' . $color->id . '/edit') }}">Edit</a>
                                                            @if ($color->status == 1)
                                                            <input data-id="{{$color->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $color->status ? 'checked' : '' }}>
                                                            @else
                                                            <input data-id="{{$color->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="InActive" data-off="Active" {{ $color->status ? 'checked' : '' }}>
                                                            
                                                            @endif
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@endsection
