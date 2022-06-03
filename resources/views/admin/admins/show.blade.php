@extends('admin.master')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <h1 class="h3 mb-2 text-gray-800" style="margin-right: -202px; margin-left: 91px">Admin Details Page</h1>
        <div class="card shadow mb-4" style="margin-left: 89px; border-right-width: 3px">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Admin Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="margin-top: -14px;">
                    <table class="table table-bordered" style="margin-top: 6px" id="dataTable" width="71%" cellspacing="0">
                        <thead>

                            <tr>
                                <th>Name: </th>
                                <td>{{ $admin->name }}</td>
                            </tr>

                            <tr>
                                <th>Email: </th>
                                <td>{{ $admin->email }}</td>
                            </tr>

                            <tr>
                                <th>Possition: </th>
                                <td>{{ $admin->possition }}</td>
                            </tr>

                           
                            <tr>
                                <th>Description</th>
                                <td>{{ $admin->description }}</td>
                            </tr>

                            <tr>
                                <th>Address</th>
                                <td>{{ $admin->address }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($admin->status==1)
                                        <span class="label label-success">Active</span>
                                    @else
                                    <span class="label label-warning">Deactive</span>
                                    @endif    
                                </td>
                            </tr>
                            <tr>
                                <th>Education</th>
                                <td>{{ $admin->education }}</td>
                            </tr>
                            <form action="{{ url('admin/' . $admin->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                                <a class="btn btn-warning" href="{{ url('admin/' . $admin->id . '/edit') }}">Edit</a>
                            </form>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
