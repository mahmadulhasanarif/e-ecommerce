@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><b>User Dashboard</b></div>
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
                                <th scope="col" width="15%">Email</th>
                                <th scope="col" width="10%">Created at</th>
                                <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                <th scope="row">{{ $users->firstItem()+$loop->index }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{Carbon\Carbon::parse( $user->created_at )->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-danger"  href="{{ route('user.destroy',$user->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection