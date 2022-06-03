<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['admins'] = Admin::all();
        return view('admin.admins.admin', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $this->data['admin'] = new Admin();
        return view('admin.admins.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->data = $request->all();
        if($request->file('image')){
            $this->data['image'] = Storage::putFile('/admin', $request->file('image'));
        }
        Admin::create($this->data);
        Session::flash('message', 'Admin Data Uploaded Successfully');
        return redirect()->to('admin');
    }

    public function show(Admin $admin)
    {
        $this->data['admin'] = $admin;
        return view('admin.admins.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $this->data['admin'] = $admin;
        if($admin->imaga){
            $this->data['admin']->image = Storage::url($admin->image);
        }
        return view('admin.admins.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $this->data = $request->all();

        $admin->name = $this->data['name'];
        $admin->email = $this->data['email'];
        $admin->address = $this->data['address'];
        $admin->possition = $this->data['possition'];
        $admin->education = $this->data['education'];
        $admin->description = $this->data['description'];

        if($request->file('image')){
            if($admin->image){
                Storage::delete($admin->image);
            }
            $admin->image = Storage::putFile('/admin', $request->file('image'));
        }

        $admin->save();
        Session::flash('message', 'Admin Updated Successfully');
        return redirect()->to('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        if($admin->image){
            Storage::url($admin->image);
        }
        
        Session::flash('message', 'Admin Deleted Successfully');
        return redirect()->back();
    }
    public function status(Admin $admin)
    {
        if ($admin->status == 1) {
            $admin->update(['status'=> 0]);
        } else {
            $admin->update(['status'=>1]);
        }

        Session::flash('message', 'Admin Status Change Successfully');
        return redirect()->back();
        
    }
}
