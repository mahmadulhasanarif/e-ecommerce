<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shiping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $this->data['categories'] = Category::all();
        $user_id = User::all();
        return view('frontend.checkout', $this->data, compact('user_id'));
    }

    public function store(Request $request)
    {
        $this->data['name'] = $request->name;
        $this->data['email'] = $request->email;
        $this->data['address'] = $request->address;
        $this->data['phone'] = $request->phone;
        $s_id = Shiping::insertGetId($this->data);
        Session::put('s_id', $s_id);
        return redirect()->to('payment');
    }

    public function payment()
    {
        $cartCollection = \Cart::getContent();
        $cart_array = $cartCollection->toArray();
        $this->data['categories'] = Category::all();
        return view('frontend.payment', $this->data, compact('cart_array'));
    }

    public function place_order(Request $request)
    {
        $payment_method = $request->payment;
        $pdata = array();
        $pdata['payment_method'] =  $payment_method;
        $pdata['status'] = true;
        $payment_id = Payment::insertGetId($pdata);

        $odata = array();

        $odata['user_id'] = Auth::user()->id;
        $odata['shiping_id'] = Session::get('s_id');
        $odata['payment_id'] = $payment_id;
        $odata['total'] = \Cart::getTotal();
        $odata['status'] ='pending';

        $order_id = Order::insertGetId($odata);

        $cartCollection = \Cart::getContent();
        $oddata = array();

        foreach ($cartCollection as $cartContent) {
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $cartContent->id;
            $oddata['product_name'] = $cartContent->name;
            $oddata['product_price'] = $cartContent->price;
            $oddata['product_sales_quantity'] = $cartContent->quantity;

            DB::table('order_details')->insert($oddata);
        }

        if($payment_method == 'cash'){
            \Cart::clear();
            $this->data['categories']= Category::all();
            return view('frontend.order_done', $this->data);
        }elseif ($payment_method == 'bkash') {
            \Cart::clear();
            $this->data['categories']= Category::all();
            return view('frontend.order_done', $this->data);
        }
        elseif ($payment_method == 'nagat') {
            \Cart::clear();
            $this->data['categories']= Category::all();
            return view('frontend.order_done', $this->data);
        }
        elseif ($payment_method == 'rocket') {
            \Cart::clear();
            $this->data['categories']= Category::all();
            return view('frontend.order_done', $this->data);
        }


    }
}