@extends('frontend.master')

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
