<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::latest()->paginate(5);
        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = $request->file('image');

        $name = hexdec(uniqid()).'.'.strtolower($images->getClientOriginalExtension());
        Image::make($images)->resize(360,240)->save('images/subcategory/'.$name);
        $reqImage = 'images/subcategory/'.$name;
        Subcategory::insert([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$reqImage,
            'created_at'=>Carbon::now()
        ]);
        Session::flash('message', 'SubCategory Added Successfully');
        return redirect()->route('subcategory.index');
    }

    public function status(Subcategory $subcategory)
   {
        if ($subcategory->status == 1){
            $subcategory->update(['status'=> 0]);
        }else{
            $subcategory->update(['status'=> 1]);
        }
        Session::flash('message', "Subcategory Status Update successfully");
        return redirect()->back();
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
        return view('admin.subcategory.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $images = $request->file('image');
        if($images){
            $old_image = $request->old_image;
            unlink($old_image);
            $name = hexdec(uniqid()).'.'.strtolower($images->getClientOriginalExtension());
            Image::make($images)->resize(360,240)->save('images/subcategory/'.$name);
            $reqImage = 'images/subcategory/'.$name;
            Subcategory::find($id)->update([
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'title'=>$request->title,
                'description'=>$request->description,
                'image'=>$reqImage,
                'created_at'=>Carbon::now()
            ]);
            Session::flash('message', 'Sub Category Updated Successfully');
            return redirect()->route('subcategory.index');
        }else{
            Subcategory::find($id)->update([
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'title'=>$request->title,
                'description'=>$request->description,
                'created_at'=>Carbon::now()
            ]);
            Session::flash('message', 'Sub Category Data Updated Successfully');
            return redirect()->route('subcategory.index');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $sub = Subcategory::find($id);
       $images = $sub->image;
        unlink($images);
        Subcategory::find($id)->delete();
        Session::flash('message', 'Sub Category Deleted Successfully');
        return redirect()->back();
    }
}
