<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['subcategories'] = Subcategory::all();
        return view('admin.sub_category.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['subcategory'] = New Subcategory();
        $this->data['categories'] = Category::all();
        return view('admin.sub_category.form', $this->data);
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
        if ($request->file('image')) {
            $this->data['image'] = Storage::putFile('/images', $request->file('image'));
        }
        Subcategory::create($this->data);
        Session::flash('message', 'SubCategory Added Successfully');
        return redirect()->to('subcategory');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $this->data['subcategory'] = $subcategory;
        $this->data['categories'] = Category::all();
        if ($subcategory->image) {
            $this->data['subcategory']->image = Storage::url($subcategory->image);     
        }
        return view('admin.sub_category.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $this->data = $request->all();

        $subcategory->category_id = $this->data['category_id'];
        $subcategory->name = $this->data['name'];
        $subcategory->title = $this->data['title'];
        $subcategory->slug = $this->data['slug'];
        $subcategory->description = $this->data['description'];

        if($request->file('image')){
            if($subcategory->image){
                Storage::delete($subcategory->image);
            }

            $subcategory->image = Storage::putFile('/images', $request->file('image'));
        }

        $subcategory->save();

        Session::flash('message', 'Sub Category Updated Successfully');
        return redirect()->to('subcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        if($subcategory->image){
            Storage::delete($subcategory->image);
        }

        Session::flash('message', 'Sub Category Deleted Successfully');
        return redirect()->back();
    }
}
