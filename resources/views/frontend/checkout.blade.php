{{-- @extends('frontend.master')

@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title" style="color: #D10024;">Shiping Address</h3>
                        </div>
                        <form action="{{url('checkout_details')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input class="input" type="text" name="name" placeholder="Name" >
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="zip_code" placeholder="ZIP Code">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="phone" placeholder="Phone">
                            </div>
                            <button style="float: right" type="submit" class="primary-btn order-submit">Next</button>
                        </form>
                    </div>
                    <!-- /Billing Details -->

                </div>

                <div class="col-md-3"></div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
 --}}

@extends('frontend.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card shadow mt-5">
                    <div class="card-header"><h3 class="title" style="color: #D10024;">Shiping Address</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('checkout_details') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label"><small><b>Name</b></small></label>
                                    <input type="text" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" name="name">
                                    @error('name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><small><b>Email</b></small></label>
                                    <input type="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email">
                                    @error('email')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><small><b>Address</b></small></label>
                                    <input type="text" placeholder="Enter Address" class="form-control @error('address') is-invalid @enderror" name="address">
                                    @error('address')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><small><b>phone</b></small></label>
                                    <input type="text" placeholder="Enter Your phone number" class="form-control @error('phone') is-invalid @enderror" name="phone">
                                    @error('phone')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                
                                <button type="submit" style="float: right" class="primary-btn order-submit">Next</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection
