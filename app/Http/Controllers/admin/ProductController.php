<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.product', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['product'] = new Product();
        $this->data['categories'] = Category::all();
        $this->data['subcategories'] = Subcategory::all();
        $this->data['brands'] = Brand::all();
        $this->data['units'] = Unit::all();
        $this->data['colors'] = Color::all();
        $this->data['sizes'] = Size::all();
        return view('admin.product.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->cat_id = $request->cat_id;
        $product->subcat_id = $request->subcat_id;
        $product->brand_id = $request->brand_id;
        $product->unit_id = $request->unit_id;
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;

        $images=array();
        if($files=$request->file('file')){
            $i=0;
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $fileNameExtract=explode('.',$name);
                $fileName=$fileNameExtract[0];
                $fileName.=time();
                $fileName.=$i;
                $fileName.='.';
                $fileName.=$fileNameExtract[1];

                $file->move('image',$fileName);
                $images[]=$fileName;
                $i++;
            }
            $product['file'] = implode("|",$images);
            Session::put('id', $product);
            $product->save();

            Session::flash('message', 'Product Data Added Successfully');
            return redirect()->to('product');
        }else{
            echo "error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $this->data['product'] = new Product();
        $this->data['product'] = $product;
        return view('admin.product.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function status(Product $product)
    {
        if ($product->status == 1){
            $product->update(['status'=> 0]);
        }else{
            $product->update(['status'=>1]);
        }
        Session::flash('message', "Product Status Update successfully");
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Product $product)
    {
        $this->data['product'] = $product;
        $this->data['categories'] = Category::all();
        $this->data['brands'] = Brand::all();
        $this->data['colors'] = Color::all();
        $this->data['sizes'] = Size::all();
        $this->data['units'] = Unit::all();
        $this->data['subcategories'] = Subcategory::all();
        if($product->image){
            $this->data['product']->image = Storage::url($product->image);
        }
        return view('admin.product.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $size = explode(',', $request->size);
        $color = explode(',', $request->color);
        $update = $product->update([
            'code' => $request->code,
            'name' => $request->name,
            'cat_id' => $request->cat_id,
            'subcat_id' => $request->subcat_id,
            'brand_id' => $request->brand_id,
            'unit_id' => $request->unit_id,
            'size_id' =>(int) json_encode($size),
            'color_id' =>(int) json_encode($color),
            'description' => $request->description,
            'price' => $request->price,
            'slug' => $request->slug
        ]);
        
        if($request->file('image')){
            if($product->image){
                Storage::delete($product->image);
            }
            $product->image = Storage::putFile('/product', $request->file('image'));
        }

        $product->save();
        Session::flash('message', 'Product Updated Successfully');
        return redirect()->to('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        if($product->image){
            Storage::url($product->image);
        }
        
        Session::flash('message', 'Product Deleted Successfully');
        return redirect()->to('product');
    }
}
