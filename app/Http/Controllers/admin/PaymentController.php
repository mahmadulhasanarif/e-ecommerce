<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::latest()->paginate(5);
        return view('admin.payment.index', compact('payments'));
    }

    public function create()
    {
        return view('admin.payment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method'=>'required'
        ]);
        Payment::insert([
            'payment_method'=>$request->payment_method,
            'created_at'=>Carbon::now()
        ]);
        Session::flash('message', 'Payment Data Uploaded Successfully');
        return redirect()->route('payment.index');
    }

    
    public function edit(Payment $payment)
    {
        $payment['payments'] = $payment;
        return view('admin.payment.edit', compact('payment'));
    }

   
    public function update(Request $request, $id)
    {
        Payment::find($id)->update([
            'payment_method'=>$request->payment_method,
            'updated_at'=>Carbon::now()
        ]);
        Session::flash('message', 'Payment Data Updated Successfully');
        return redirect()->route('payment.index');
    }

   
    public function destroy($id)
    {
        Payment::find($id)->delete();
        Session::flash('message', 'Payment Data Deleted Successfully');
        return redirect()->back();
    }

    public function status(Payment $payment)
    {
        if ($payment->status == 1) {
            $payment->update(['status'=> 0]);
        } else {
            $payment->update(['status'=>1]);
        }

        Session::flash('message', 'Payment Status Change Successfully');
        return redirect()->back();
        
    }
}
