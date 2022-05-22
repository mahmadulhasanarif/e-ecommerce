@extends('admin.master')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="container-fluid" style="margin-top: -40px">
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
                    <div class="col-md-12" style="margin-top: -20px">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
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
                                                <td class="center">
                                                    {{ \Carbon\Carbon::parse($color->created_at)->format('M d, Y, h:iA') }}
                                                </td>

                                                
                                                <td class="center" style="float: center;">
                                                    <div class="row">
                                                   <div class="col p-1">
                                                        @if ($color->status == 1)
                                                        <a class="btn btn-success"
                                                            href="{{ url('/color_status/' . $color->id) }}">
                                                            <i class="halflings-icon white thumbs-up"></i>
                                                        </a>
                                                    @else
                                                        <a class="btn btn-denger"
                                                            href="{{ url('/color_status/' . $color->id) }}">
                                                            <i class="halflings-icon white thumbs-down"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                                        <div class="col p-1">
                                                            <a class="btn btn-info"
                                                                href="{{ url('/color/' . $color->id. '/edit') }}">
                                                                <i class="halflings-icon white edit"></i>
                                                            </a>
                                                    </div>

                                                        <div class="col p-1">
                                                            <form action="{{ url('color/' . $color->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger" id="delete">
                                                                    <i class="halflings-icon white trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
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
