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
                        <h2 class="h3 mb-0 page-title"> Product Size Table</h2>
                        <p class="card-text">eCommerce Product size table </p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('size.create') }}" class="btn btn-primary"><span
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
                                            <th style="width: 45%">Size</th>
                                            <th style="width: 7%">Status</th>
                                            <th style="width: 21%">Date</th>
                                            <th style="width: 12%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sizes as $size)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox">
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="row">
                                                    @foreach (Json_decode($size->size) as $sizess)
                                                        <ul class="col col-lg-4">
                                                            {{ $sizess }}
                                                        </ul>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($size->status == 1)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td class="center">
                                                    {{ \Carbon\Carbon::parse($size->created_at)->format('M d, Y, h:iA') }}
                                                </td>


                                                <td class="center" style="float: center;">
                                                    <div class="row">
                                                        <div class="col p-1">
                                                            @if ($size->status == 1)
                                                                <a class="btn btn-success"
                                                                    href="{{ url('/size_status/' . $size->id) }}">
                                                                    <i class="halflings-icon white thumbs-up"></i>
                                                                </a>
                                                            @else
                                                                <a class="btn btn-denger"
                                                                    href="{{ url('/size_status/' . $size->id) }}">
                                                                    <i class="halflings-icon white thumbs-down"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="col p-1">
                                                            <a class="btn btn-info"
                                                                href="{{ url('/size/' . $size->id . '/edit') }}">
                                                                <i class="halflings-icon white edit"></i>
                                                            </a>
                                                        </div>

                                                        <div class="col p-1">
                                                            <form action="{{ url('size/' . $size->id) }}" method="POST">
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
