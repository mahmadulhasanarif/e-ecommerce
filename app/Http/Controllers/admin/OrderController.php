<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function order_manage()
    {
        $this->data['orders'] = Order::all();
        return view('admin.order.order', $this->data);
    }

   public function order_status(Order $order)
   {
        if ($order->status == 'runing'){
            $order->update(['status'=>'pending']);
        }else{
            $order->update(['status'=>'runing']);
        }
        return redirect()->back()->with('message', "Order Status update successfully");
   }

   public function show($id)
   {
       $orders = Order::where('orders.id', $id)->first();
       $order_details = OrderDetail::where('order_id', $id)->get();
       return view('admin.order.view', compact('orders', 'order_details'));
   }
}
