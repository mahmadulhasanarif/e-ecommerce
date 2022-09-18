<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Shiping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShipingController extends Controller
{
    public function index()
    {
        $shipings = Shiping::latest()->paginate(5);
        return view('admin.shiping.index', compact('shipings'));
    }

    public function create()
    {
        return view('admin.shiping.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required'
        ]);
        Shiping::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now()
        ]);
        Session::flash('message', 'Shiping Data Uploaded Successfully');
        return redirect()->route('shiping.index');
    }

    
    public function edit(Shiping $shiping)
    {
        $shiping['shipings'] = $shiping;
        return view('admin.shiping.edit', compact('shiping'));
    }

   
    public function update(Request $request, $id)
    {
        Shiping::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'updated_at'=>Carbon::now()
        ]);
        Session::flash('message', 'Shiping Data Updated Successfully');
        return redirect()->route('shiping.index');
    }

   
    public function destroy($id)
    {
        Shiping::find($id)->delete();
        Session::flash('message', 'shiping Data Deleted Successfully');
        return redirect()->back();
    }

    public function status(Shiping $shiping)
    {
        if ($shiping->status == 1) {
            $shiping->update(['status'=> 0]);
        } else {
            $shiping->update(['status'=>1]);
        }

        Session::flash('message', 'shiping Status Change Successfully');
        return redirect()->back();
        
    }
}
