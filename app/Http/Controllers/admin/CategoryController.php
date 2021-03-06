<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.category', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->data['category'] = New Category();
        return view('admin.category.form');
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
        Category::create($this->data);
        Session::flash('message', 'Category Data Added Successfully');
        return redirect()->to('category');
    }

    public function edit(Category $category)
    {
        $this->data['category'] = $category;
        if ($category->image) {
            $this->data['category']->image = Storage::url($category->image);     
        }
        return view('admin.category.form', $this->data);
    }

    public function update(Category $category, Request $request)
    {
        $this->data = $request->all();

        $category->name = $this->data['name'];
        $category->slug = $this->data['slug'];
        if($request->file('image')){
            if($category->image){
                Storage::delete($category->image);
            }

            $category->image = Storage::putFile('/images', $request->file('image'));
        }

        $category->save();

        Session::flash('message', 'Category Updated Successfully');
        return redirect()->to('category');
    }

    public function status(Category $category)
   {
        if ($category->status == 1){
            $category->update(['status'=> 0]);
        }else{
            $category->update(['status'=>1]);
        }
        Session::flash('message', "category Status Update successfully");
        return redirect()->back();
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('message', 'Category Deleted Successfully');
        return redirect()->back();
    }
}
