@extends('admin.master')
@section('content')
<p class="alert-success">
    <?php
    $message = Session::get('message');
    if ($message) {
        echo $message;
        Session::put('message', null);
    }
    ?>
</p>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
   

            </div>


            <div class="box-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Date & Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="center">{{ $order->user->name }}</td>
                                <td class="center">{{ $order->total }}</td>
                                <td class="center">
                                    {{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y, h:iA') }}</td>

                                <td class="center">
                                    @if ($order->status == 'runing')
                                        <span class="label label-success">active</span>
                                    @else
                                        <span class="label label-danger">Deactive</span>
                                    @endif


                                </td>
                                <td class="center">
                                    @if ($order->status == 'runing')
                                        <a class="btn btn-success" href="{{ url('/order_status/'. $order->id) }}">
                                            <i class="halflings-icon white thumbs-up"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-danger" href="{{ url('/order_status/' . $order->id) }}">
                                            <i class="halflings-icon white thumbs-down"></i>
                                        </a>
                                    @endif



                                    <a class="btn btn-info" href="{{url('/order_view/'. $order->id)}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a class="btn btn-danger" href="#" id="delete">
                                        <i class="halflings-icon white trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
