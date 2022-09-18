<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'name'=>'required|unique:categories|min:3,',
            'title'=>'required',
            'description'=>'required|min:15'
            ],
            [
            'name.required'=>'Please Enter Category Name',
            'title.required'=>'Please Enter Title Here',
            'description.required'=>'Please Enter Description Here'
            ]);

            Brand::insert([
                'name'=>$request->name,
                'title'=>$request->title,
                'description'=>$request->description,
                'created_at'=>Carbon::now()
            ]);
        
        Session::flash('message', 'Brand Insert Successfully');
        return redirect()->route('brand.index');
    }

    public function edit(Brand $brand)
    {
        $brand['brands'] = $brand;
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        Brand::find($id)->update([
            'name'=>$request->name,
            'title'=>$request->title,
            'description'=>$request->description,
            'updated_at'=>Carbon::now()
        ]);

        Session::flash('message', 'Brand Updated Successfully');
        return redirect()->route('brand.index');
    }

    public function destroy($id)
    {
        Brand::find($id)->delete();
        Session::flash('message', 'Product Deleted Successfully');
        return redirect()->back();
    }
}
