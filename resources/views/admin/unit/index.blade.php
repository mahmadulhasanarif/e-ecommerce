@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><a style="float: right" href="{{ route('unit.create') }}" class="btn btn-primary">Add Unit</a></div>
                <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success " role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="10%" scope="col">SL NO</th>
                                <th scope="col" width="10%">Name</th>
                                <th scope="col" width="20%">Title</th>
                                <th scope="col" width="30%">Description</th>
                                <th scope="col" width="15%">Created_at</th>
                                <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($units as $unit)
                                <tr>
                                <th scope="row">{{ $units->firstItem()+$loop->index }}</th>
                                <td>{{ $unit->name }}</td>
                                <td>{{ $unit->title }}</td>
                                <td>{{ $unit->description }}</td>
                                <td>{{ Carbon\Carbon::parse($unit->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('unit.edit',$unit->id) }}">Edit</a>
                                    <a class="btn btn-danger"  href="{{ route('unit.destroy',$unit->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $units->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection