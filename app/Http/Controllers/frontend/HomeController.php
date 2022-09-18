<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $this->data['categorie'] = Category::where('status',1)->latest()->limit(3)->get();
        $this->data['categories'] = Category::all();
        $this->data['brands'] = Brand::all();
        $this->data['colors'] = Color::all();
        $this->data['sizes'] = Size::all();
        $this->data['units'] = Unit::all();
        $this->data['subcategories'] = Subcategory::all();
        $this->data['products'] = Product::where('status',1)->latest()->limit(12)->get();


        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(8)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }
        return view('frontend.welcome', $this->data, compact('topProducts'));
    }

    public function product_view($id)
    {
        $this->data['categories'] = Category::all();
        $this->data['brands'] = Brand::all();
        $this->data['product'] = Product::findOrFail($id);
        $this->data['colors'] = Color::find($this->data['product']->color_id);
        $this->data['sizes'] = Size::find($this->data['product']->size_id);
        $this->data['units'] = Unit::all();
        $this->data['subcategories'] = Subcategory::all();
        $cat_id = $this->data['product']->cat_id;
        $this->data['related_products'] = Product::where('cat_id', $cat_id)->latest()->paginate(4);
        return view('frontend.product_details', $this->data);
    }

    public function cat_shop($id)
    {
        $this->data['categories'] = Category::all();
        $this->data['subcategories'] = Subcategory::all();
        $this->data['brands'] = Brand::all();
        $this->data['products'] = Product::where('cat_id', $id)->latest()->paginate(9);
        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(3)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }
        return view('frontend.cat_shop', $this->data, compact('topProducts'));
    }

    public function subcat_shop($id)
    {
        $this->data['categories'] = Category::all();
        $this->data['subcategories'] = Subcategory::all();
        $this->data['brands'] = Brand::all();
        $this->data['products'] = Product::where('subcat_id', $id)->latest()->paginate(9);

        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(3)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }
        return view('frontend.subcat_shop', $this->data, compact('topProducts'));
    }

    public function brand_shop($id)
    {
        $this->data['categories'] = Category::all();
        $this->data['subcategories'] = Subcategory::all();
        $this->data['brands'] = Brand::all();
        $this->data['products'] = Product::where('brand_id', $id)->latest()->paginate(9);

        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(3)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }
        return view('frontend.brand_shop', $this->data, compact('topProducts'));
    }

    public function search(HttpRequest $request){
        $products=Product::orderBy('id','desc')->where('name','LIKE','%'.$request->product.'%');
        if($request->category != "ALL") $products->where('cat_id',$request->category);
        $products= $products->paginate(1);
        $categories= Category::all();
        $subcategories= SubCategory::all();
        $brands= Brand::all();
        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(3)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }
        return view('frontend.cat_shop',compact('categories','subcategories','brands','products', 'topProducts'));
    }
}
