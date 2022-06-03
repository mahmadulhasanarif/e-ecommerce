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
                        <h2 class="h3 mb-0 page-title">Unit Table</h2>
                        <p class="card-text">eCommerce Unit table </p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('unit.create') }}" class="btn btn-primary"><span
                                class="fe fe-user-plus fe-12 mr-2"></span>Create</a>
                    </div>
                </div>

                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">#</th>
                                            <th style="width: 10%">ID</th>
                                            <th style="width: 15%">Name</th>
                                            <th style="width: 20%">Title</th>
                                            <th style="width: 10%">slug</th>
                                            <th style="width: 10%">Date</th>
                                            <th style="width: 10%">Status</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($units as $unit)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox">
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $unit->name }}</td>
                                                <td>{{ $unit->title }}</td>
                                                <td>{{ $unit->slug }}</td>
                                                <td>{{ $unit->created_at }}</td>
                                                <td>
                                                    @if ($unit->status == 1)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Deactive</span>
                                                    @endif
                                                </td>

                                                <td class="center" style="float: center;">
                                                    <div class="row">
                                                        <div class="col-lg-3 p-1">
                                                            @if ($unit->status == 1)
                                                                <a class="btn btn-success"
                                                                    href="{{ url('/unit_status/' . $unit->id) }}">
                                                                    <i class="halflings-icon white thumbs-up"></i>
                                                                </a>
                                                            @else
                                                                <a class="btn btn-danger"
                                                                    href="{{ url('/unit_status/' . $unit->id) }}">
                                                                    <i class="halflings-icon white thumbs-down"></i>
                                                                </a>
                                                            @endif

                                                        </div>

                                                        <div class="col-lg-3 p-1">
                                                            <a class="btn btn-info"
                                                                href="{{ url('/unit/' . $unit->id . '/edit') }}">
                                                                <i class="halflings-icon white edit"></i>
                                                            </a>
                                                        </div>
                                                        
                                                    <div class="col-lg-3 p-1">
                                                        <a class="btn btn-info"
                                                                href="{{ url('/unit/'. $unit->id) }}">
                                                                <i class="halflings-icon white info"></i>
                                                            </a>
                                                    </div>
                                                        <div class="col-lg-3  p-1">
                                                            <form action="{{ url('unit/' . $unit->id) }}"
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
