<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view('admin.size.size', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['size'] = new Size();
        return view('admin.size.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        $this->data['size'] = $size;
        return view('admin.Size.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $sizes = explode(',', $request->size);
        $update = $size->update([
            'size'=>json_encode($sizes)
        ]);
        if ($update) {
            Session::flash('message', 'Size Updated Successfully');
            return redirect()->to('size');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        Session::flash('message', 'Size Deleted Successfully');
        return redirect()->back();
    }
}
