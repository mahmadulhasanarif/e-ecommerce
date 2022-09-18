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
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $this->data['product'] = new Product();
        $this->data['categories'] = Category::all();
        $this->data['subcategories'] = Subcategory::all();
        $this->data['brands'] = Brand::all();
        $this->data['units'] = Unit::all();
        $this->data['colors'] = Color::all();
        $this->data['sizes'] = Size::all();
        return view('admin.product.create', $this->data);
    }

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
        $product->price = $request->price;
        $product->description = $request->description;

        $images=array();
        if($files=$request->file('image')){
            $i=0;
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $fileNameExtract=explode('.',$name);
                $fileName=$fileNameExtract[0];
                $fileName.=time();
                $fileName.=$i;
                $fileName.='.';
                $fileName.=$fileNameExtract[1];

                $file->move('images/product/',$fileName);
                $images[]=$fileName;
                $i++;
            }
            $product['image'] = implode("|",$images);
            Session::put('id', $product);
            $product->save();

            Session::flash('message', 'Product Data Added Successfully');
            return redirect()->route('product.index');
        }else{
            echo "error";
        }
    }

    public function show(Product $product)
    {
        $this->data['product'] = new Product();
        $this->data['product'] = $product;
        return view('admin.product.show', $this->data);
    }

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
        return view('admin.product.edit', $this->data);
    }

    public function update(Request $request, Product $product)
    {
        $update = $product->update([
            'code' => $request->code,
            'name' => $request->name,
            'cat_id' => $request->cat_id,
            'subcat_id' => $request->subcat_id,
            'brand_id' => $request->brand_id,
            'unit_id' => $request->unit_id,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        if($update){
            Session::flash('message', 'Product Updated Successfully');
            return redirect()->route('product.index');
        }else{
            echo "Some Error Here";
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        
        Session::flash('message', 'Product Deleted Successfully');
        return redirect()->route('product.index');
    }
}
