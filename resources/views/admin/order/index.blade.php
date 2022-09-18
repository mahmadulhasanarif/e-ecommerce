@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><b>Order Index</b></div>
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
                                <th scope="col" width="10%">Customer</th>
                                <th scope="col" width="15%">Shiping Name</th>
                                <th scope="col" width="20%">Payment method</th>
                                <th scope="col" width="15%">Total</th>
                                <th scope="col" width="15%">Created at</th>
                                <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                <th scope="row">{{ $orders->firstItem()+$loop->index }}</th>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->shiping->name }}</td>
                                <td>{{ $order->payment->payment_method }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{Carbon\Carbon::parse( $order->created_at )->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-danger"  href="{{ route('order.destroy',$order->id) }}">Delete</a>
                                    <a class="btn btn-danger"  href="{{ route('order.show',$order->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection