{{-- @extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="invoice">
            <a role="button" class="btn btn-info" href="#" style="float: right;">Invoice</a>
        </div>

        <div class="row">
            <div class=" row row-fluid sortable">
                <div class="col-md-6">
                    <div class="card">
                    <div class="box span6">
                        <div class="card-header">Customer Information</div>
                        <div class="box-content">

    
                        </div>
                    </div>
                    <!--/span-->
                </div>
            </div>
    
            
                <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Order Details</div>
                        <div class="box-content">
                            
                        </div>
                    </div>
                </div>
            </div>
    
        </div>


            
    </div>
</div>
@endsection
 --}}



@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        <div class="invoice">
            <a role="button" class="btn btn-info" href="#" style="float: right;">Invoice</a>
        </div>
        <div class="row mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Customer Information</div>
                    <div class="card-body">
                        <table class="table table-success">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Customer Email </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$orders->user->name}}</td>
                                    <td class="center">{{$orders->user->email}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Order Details</div>
                    <div class="card-body">
                        <table class="table table-success">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product Name</th>
                                    <th>Product price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_details as $order)
                                <tr>
                                    <td>{{$order->order_id}}</td>
                                    <td class="center">{{$order->product_name}}</td>
                                    <td class="center">&#2547; {{$order->product_price}}</td>
                                    <td class="center">{{$order->product_sales_quantity}}</td>
                                    <td class="center"> &#2547; {{$order->product_price * $order->product_sales_quantity}}</td>
                                </tr> 
                                @endforeach
        
                            </tbody>
        
                            <tfoot>
                                <tr>
                                    <td colspan="4" style="font-size: 20px;font-weight: 521;text-align: right; color: red">
                                        Total
                                        Amount to pay</td>
                                    <td><strong style="font-size: 20px; color: #007cff;">&#2547; {{$orders->total}} </strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Shiping Details</div>
            <div class="card-body">
                <table class="table table-success">
                    <thead>
                        <tr>
                            <th scope="row" width="20%">Username</th>
                            <th scope="col" width="25%">Shipping Address</th>
                            <th scope="col" width="15%">Mobile No</th>
                            <th scope="col" width="25%">Email</th>
                            <th scope="col" width="15%">Payment</th>
                        </tr>
                    </thead>
                    <tbody>
        
                        <tr>
                            <td>{{$orders->shiping->name}}</td>
                            <td class="center">{{$orders->shiping->address}}</td>
                            <td class="center">{{$orders->shiping->phone}}</td>
                            <td class="center">{{$orders->shiping->email}}</td>
                            <td class="center">{{$orders->payment->payment_method}}</td>
        
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection