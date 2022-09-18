<?php
use App\Models\Product;
?>
@extends('frontend.master')

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        @foreach ($categories as $category)
                            <li><a class="active"
                                    href="{{ url('/product_by_cat/' . $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">
                            @foreach ($categories as $category)
                                @php
                                    $catProductCount = App\Models\Product::catProductCount($category->id);
                                @endphp
                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-1">
                                    <label for="category-1">
                                        <span></span>
                                        <li>
                                            <a href="{{url('/product_by_cat/'. $category->id)}}">
                                                {{ $category->name }}
                                            </a>
                                            <small>({{ $catProductCount }})</small>
                                        </li>
                                        
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Sub Category</h3>
                        @foreach ($subcategories as $subcategory)
                            @php
                                $subcatProductCount = App\Models\Product::subcatProductCount($subcategory->id);
                            @endphp
                            <div class="checkbox-filter">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="subcategory-1">
                                    <label for="subcategory-1">
                                        <span></span>
                                        <li>
                                            <a href="{{url('/product_by_subcat/'.$subcategory->id)}}">{{ $subcategory->name }}</a>
                                            <small>({{$subcatProductCount}})</small>
                                        </li>
                                        
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /aside Widget -->

                   <!-- aside Widget -->
                   <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    @foreach ($topProducts as $topProduct)
                        <div class="product-widget">
                            <div class="product-img">
                                @php
                                    $topProduct['image'] = explode('|', $topProduct->image);
                                    $images = $topProduct->image[0];
                                @endphp
                                <img src="{{asset('images/product/'. $images)}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{$topProduct->category->name}}</p>
                                <h3 class="product-name"><a href="#">{{$topProduct->name}}</a></h3>
                                <h4 class="product-price">&#2547; {{$topProduct->price}}.00 <del class="product-old-price">&#2547; {{$topProduct->price}}.00</del></h4>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">12</option>
                                    <option value="1">24</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        @foreach ($products as $product)
                            @php
                                $product['image'] = explode('|', $product->image);
                                $images = $product->image[0];
                            @endphp
                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <a href="{{ url('/product_view/' . $product->id) }}">
                                            <img src="{{ asset('images/product/' . $images) }}" height="256px" width="256px"
                                                alt="">
                                        </a>
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><a
                                                href="{{ url('/product_view/' . $product->id) }}">{{ $product->category->name }}</a>
                                        </p>
                                        <h3 class="product-name"><a
                                                href="{{ url('/product_view/' . $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <a href="{{ url('/product_view/' . $product->id) }}">
                                            <h4 class="product-price">&#2547; {{ $product->price }}.00
                                                <del class="product-old-price">&#2547; {{ $product->price }}.00</del>
                                            </h4>
                                        </a>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><a
                                                    href="{{ url('/product_view/' . $product->id) }}"><i
                                                        class="fa fa-eye"></i><span class="tooltipp">quick
                                                        view</span></a></button>
                                        </div>
                                    </div>
                                    <form action="{{ url('add-to-cart') }}" method="POST">
                                        @csrf
                                        <div class="add-to-cart">
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add
                                                to
                                                cart</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        <!-- /product -->
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing products</span>
                        <ul>
                            <li>{!! $products->links() !!}</li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
