<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SizeController extends Controller
{

    public function index()
    {
        $sizes = Size::latest()->paginate(5);
        return view('admin.size.index', compact('sizes'));
    }

    public function create()
    {
        return view('admin.size.create');
    }

    public function store(Request $request)
    {
        $this->data = explode(',', $request->size);
        $size = New Size();
        $size->size = json_encode($this->data);
        $size->save();
        Session::flash('message', 'Size Uploaded Successfully');
        return redirect()->to('size');
    }

    public function status(Size $size)
    {
        if ($size->status == 1){
            $size->update(['status'=> 0]);
        }else{
            $size->update(['status'=>1]);
        }
        Session::flash('message', "Size Status Update successfully");
        return redirect()->back();
    }


    public function edit(Size $size)
    {
        $this->data['size'] = $size;
        return view('admin.Size.edit', $this->data);
    }


    public function update(Request $request, $id)
    {
        $sizes = explode(',', $request->size);
        $update = Size::find($id)->update([
            'size'=>json_encode($sizes)
        ]);
        if ($update) {
            Session::flash('message', 'Size Updated Successfully');
            return redirect()->route('size.index');
        }
    }

    
    public function destroy($id)
    {
        Size::find($id)->delete();
        Session::flash('message', 'Size Deleted Successfully');
        return redirect()->back();
    }
}
