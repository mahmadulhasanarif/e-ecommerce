<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['brands'] = Brand::all();
        return view('admin.brand.brand', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['brand'] = new Brand();
        return view('admin.brand.form', $this->data);
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
        Brand::create($this->data);
        Session::flash('message', 'Brand Product Uploaded Successfully');
        return redirect()->to('brand');
    }

    public function show(Brand $brand)
    {
        $this->data['brand'] = $brand;
        return view('admin.brand.show', $this->data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $this->data['brand'] = $brand;
        return view('admin.brand.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->data = $request->all();

        $brand->name = $this->data['name'];
        $brand->title = $this->data['title'];
        $brand->slug = $this->data['slug'];
        $brand->description = $this->data['description'];
        $brand->save();
        Session::flash('message', 'Product Updated Successfully');
        return redirect()->to('brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        Session::flash('message', 'Product Deleted Successfully');
        return redirect()->back();
    }
}
