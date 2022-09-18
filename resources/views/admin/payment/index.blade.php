@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><a style="float: right" href="{{ route('payment.create') }}" class="btn btn-primary">Add Payment</a></div>
                <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success " role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="20%" scope="col">SL NO</th>
                                <th scope="col" width="30%">payment Method</th>
                                <th scope="col" width="25%">Created at</th>
                                <th scope="col" width="25%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                <tr>
                                <th scope="row">{{ $payments->firstItem()+$loop->index }}</th>
                                <td>{{ $payment->payment_method }}</td>
                                <td>{{Carbon\Carbon::parse( $payment->created_at )->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('payment.edit',$payment->id) }}">Edit</a>
                                    <a class="btn btn-danger"  href="{{ route('payment.destroy',$payment->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection