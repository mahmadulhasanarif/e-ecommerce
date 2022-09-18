@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <<div class="row">

            <div class="invoice">
                <a role="button" class="btn btn-info" href="#" style="float: right;">Invoice</a>
            </div>
    
    
    
            <br>
            <div class=" row row-fluid sortable">
                <div class="col-md-4">
                    <div class="box span6">
                        <div style="margin: 10px; height: 40px" class="box-header">
                            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer
                                Information
                            </h2>
                            <div class="box-icon">
                                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <table class="table">
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
                    <!--/span-->
                </div>
    
    
                <div class="col-md-8">
                    <div class="box span6">
                        <div style="margin: 10px; height: 40px" class="box-header">
                            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details
                            </h2>
                            <div class="box-icon">
                                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Shipping Address</th>
                                        <th>Mobile No</th>
                                        <th>Email Address</th>
                                        <th>Payment Method</th>
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
                    <!--/span-->
                </div>
    
            </div>
            <div class="box span12">
                <div style="margin: 10px; height: 40px" class="box-header">
                    <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped">
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
@endsection
