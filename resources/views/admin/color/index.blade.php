@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><a style="float: right" href="{{ route('color.create') }}" class="btn btn-primary">Add Color</a></div>
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
                                    <th scope="col" width="60%">Color</th>
                                    <th scope="col" width="15%">Created At</th>
                                    <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $color)
                                <tr>
                                <th scope="row">{{ $colors->firstItem()+$loop->index }}</th>
                                <td class="row">
                                    @foreach (Json_decode($color->color) as $colorss)
                                        <ul class="col-md-3">
                                            {{ $colorss }}
                                        </ul>
                                    @endforeach
                                </td>
                                <td>{{ Carbon\Carbon::parse($color->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('color.edit',$color->id) }}">Edit</a>
                                    <a class="btn btn-danger"  href="{{ route('color.destroy',$color->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $colors->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection