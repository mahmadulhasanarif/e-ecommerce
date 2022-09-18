@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Add Payment</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('payment.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label"><small><b>Payment Method</b></small></label>
                                    <input type="text" placeholder="Enter payment method" class="form-control @error('payment_method') is-invalid @enderror" name="payment_method">
                                    @error('payment_method')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection
