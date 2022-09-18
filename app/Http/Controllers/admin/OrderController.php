<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $this->data['orders'] = Order::latest()->paginate(5);
        return view('admin.order.index', $this->data);
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

   public function destroy($id)
   {
    Order::find($id)->delete();
    Session::flash('message', 'Order Deleted Successfully');
    return redirect()->back();
   }
}
