<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function cart(Request $request){
        $quantity = $request->quantity;
        $id = $request->id;

        $products = Product::where('id', $id)->first();
        $this->data['quantity'] = $quantity;
        $this->data['id'] = $products->id;
        $this->data['name'] = $products->name;
        $this->data['price'] = $products->price;
        $this->data['attributes'] = [$products->image];
        \Cart::add($this->data);
        cartArray();
        return redirect()->back();
    }

    public function delete($id)
    {
        \Cart::remove($id);
        return redirect()->back();
    }
  
}
