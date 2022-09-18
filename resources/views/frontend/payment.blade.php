@extends('frontend.master')
@section('content')
    <div class="col-md-3"></div>
    <!-- Order Details -->
    <div style="margin-top: 70px; margin-bottom: 50px" class="col-md-5 order-details">
        <div class="section-title text-center">
            <h3 class="title" style="color: #D10024;">Your Order</h3>
        </div>
        <div class="order-summary">
            <div class="order-col">
                <div><strong>PRODUCT</strong></div>
                <div><strong>TOTAL</strong></div>
            </div>
            @foreach ($cart_array as $cart)
                <div class="order-products">
                    <div class="order-col">
                        <div>{{ $cart['quantity'] }} x {{ $cart['name'] }}</div>
                        <div>&#2547; {{ \Cart::get($cart['id'])->getPriceSum() }}.00</div>
                    </div>
                </div>
            @endforeach

            <div class="order-col">
                <div>Shiping</div>
                <div><strong>&#2547; 50</strong></div>
            </div>
            <div class="order-col">
                <div><strong>TOTAL</strong></div>
                <div><strong class="order-total">&#2547; {{ \Cart::getTotal() + 50 }}.00</strong></div>
            </div>
        </div>
        <form action="{{ url('place_order') }}" method="POST">
            @csrf
            <div class="section-title text-center">
                <h5 class="title" style="color: #D10024;">Please Select A payment method</h5>
            </div>
            <div class="payment-method">
                <div class="input-radio">
                    <input type="radio" name="payment" id="cash_on_delevery" value="cash">
                    <label for="cash_on_delevery">
                        <span></span>
                        Cash On Delevery
                    </label>
                    <div class="caption">
                        <p>You are choosing to Cash On Delevery.</p>
                    </div>
                </div>
                <div class="input-radio">
                    <input type="radio" name="payment" id="bkash" value="bkash">
                    <label for="bkash">
                        <span></span>
                        Bkash
                    </label>
                    <div class="caption">
                        <p>01782889864</p>
                    </div>
                </div>
                <div class="input-radio">
                    <input type="radio" name="payment" id="nagad" value="nagad">
                    <label for="nagad">
                        <span></span>
                        Nagad
                    </label>
                    <div class="caption">
                        <p>01782889864</p>
                    </div>
                </div>
                <div class="input-radio">
                    <input type="radio" name="payment" id="rocket" value="rocket">
                    <label for="rocket">
                        <span></span>
                        Rocket
                    </label>
                    <div class="caption">
                        <p>017828898647</p>
                    </div>
                </div>
            </div>
            <div class="input-checkbox">
                <input type="checkbox" id="terms">
                <label for="terms">
                    <span></span>
                    I've read and accept the <a href="#">terms & conditions</a>
                </label>
            </div>
            <button type="submit" class="primary-btn order-submit">Place order</button>
        </form>
    </div>
    <!-- /Order Details -->
    <div class="col-md-4"></div>
@endsection
