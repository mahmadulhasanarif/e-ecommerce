<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Image;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'name'=>'required|unique:categories|min:3,',
            'image'=>'required'
            ],
            [
            'name.required'=>'Please Enter Category Name',
            'image.required'=>'Please Enter a Valid Image'
            ]);
        $images = $request->file('image');
        
        $name = hexdec(uniqid()).'.'.strtolower($images->getClientOriginalExtension());
        Image::make($images)->resize(360,240)->save('images/category/'.$name);
        $imgReq = 'images/category/'.$name;

        Category::insert([
            'name'=>$request->name,
            'image'=>$imgReq,
            'created_at'=>Carbon::now()
        ]);
        Session::flash('message', 'Category Data Added Successfully');
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        $category['categories'] = $category;
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $images = $request->file('image');

        if($images){
            $old_image = $request->old_image;
            unlink($old_image);
            $name = hexdec(uniqid()).'.'.strtolower($images->getClientOriginalExtension());
            Image::make($images)->resize(360,240)->save('images/category/'.$name);
            $ImageReq = 'images/category/'.$name;
    
            Category::find($id)->update([
                'name'=>$request->name,
                'image'=>$ImageReq,
                'updated_at'=>Carbon::now(),
            ]);
    
            Session::flash('message', 'Category Updated Successfully');
            return redirect()->route('category.index');
        }else{
            Category::find($id)->update([
                'name'=>$request->name,
                'updated_at'=>Carbon::now(),
            ]);
    
            Session::flash('message', 'Category Name Updated Successfully');
            return redirect()->route('category.index');
        }

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
    public function destroy($id)
    {
        $image = Category::find($id);
        $imgDelete = $image->image;
        unlink($imgDelete);
        Category::find($id)->delete();
        Session::flash('message', 'Category Deleted Successfully');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
