@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><a style="float: right" href="{{ route('size.create') }}" class="btn btn-primary">Add Size</a></div>
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
                                <th scope="col" width="60%">Size</th>
                                <th scope="col" width="15%">Created At</th>
                                <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $size)
                                <tr>
                                <th scope="row">{{ $sizes->firstItem()+$loop->index }}</th>
                                <td class="row">
                                    @foreach (Json_decode($size->size) as $sizess)
                                        <ul class="col-md-3">
                                            {{ $sizess }}
                                        </ul>
                                    @endforeach
                                </td>
                                <td>{{ Carbon\Carbon::parse($size->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('size.edit',$size->id) }}">Edit</a>
                                    <a class="btn btn-danger"  href="{{ route('size.destroy',$size->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $sizes->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection