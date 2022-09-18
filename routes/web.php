<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ShipingController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*--Category Route--*/
    Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category_status/{category}', [CategoryController::class, 'status']);

    /*--SubCategory Route--*/
    Route::get('subcategory/index', [SubCategoryController::class, 'index'])->name('subcategory.index');
    Route::get('subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('subcategory/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('subcategory/delete/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
    Route::get('/subcategory/{subcategory}', [SubCategoryController::class, 'status']);

    /*--Brand Route--*/
    Route::get('brand/index', [BrandController::class, 'index'])->name('brand.index');
    Route::get('brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('brand/{brand}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('brand/delete/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    Route::get('/brand/{brand}', [BrandController::class, 'status']);

    /*--Unit Route--*/
    Route::get('unit/index', [UnitController::class, 'index'])->name('unit.index');
    Route::get('unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('unit/store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('unit/{unit}/edit', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('unit/delete/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');
    Route::get('/unit/{unit}', [UnitController::class, 'status']);
    
    /*--Size Route--*/
    Route::get('size/index', [SizeController::class, 'index'])->name('size.index');
    Route::get('size/create', [SizeController::class, 'create'])->name('size.create');
    Route::post('size/store', [SizeController::class, 'store'])->name('size.store');
    Route::get('size/{size}/edit', [SizeController::class, 'edit'])->name('size.edit');
    Route::post('size/update/{id}', [SizeController::class, 'update'])->name('size.update');
    Route::get('size/delete/{id}', [SizeController::class, 'destroy'])->name('size.destroy');
    Route::get('size/{size}', [SizeController::class, 'status']);
    
    /*--Color Route--*/
    Route::get('color/index', [ColorController::class, 'index'])->name('color.index');
    Route::get('color/create', [ColorController::class, 'create'])->name('color.create');
    Route::post('color/store', [ColorController::class, 'store'])->name('color.store');
    Route::get('color/{color}/edit', [ColorController::class, 'edit'])->name('color.edit');
    Route::post('color/update/{id}', [ColorController::class, 'update'])->name('color.update');
    Route::get('color/delete/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
    Route::get('color/{color}', [ColorController::class, 'status']);

    /*--Product Route--*/
    Route::get('product/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('product/show/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::post('product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('product/{product}', [ProductController::class, 'status']);
    
    /*--User Route--*/
    Route::get('user/index', [AdminController::class, 'index'])->name('user.index');
    Route::get('user/delete/{id}', [AdminController::class, 'destroy'])->name('user.destroy');
    Route::get('user/{user}', [AdminController::class, 'status']);

    /*--Shiping Route--*/
    Route::get('shiping/index', [ShipingController::class, 'index'])->name('shiping.index');
    Route::get('shiping/create', [ShipingController::class, 'create'])->name('shiping.create');
    Route::post('shiping/store', [ShipingController::class, 'store'])->name('shiping.store');
    Route::get('shiping/{shiping}/edit', [ShipingController::class, 'edit'])->name('shiping.edit');
    Route::post('shiping/update/{shiping}', [ShipingController::class, 'update'])->name('shiping.update');
    Route::get('shiping/delete/{id}', [ShipingController::class, 'destroy'])->name('shiping.destroy');
    Route::get('shiping/{shiping}', [ShipingController::class, 'status']);

    /*--Payment Route--*/
    Route::get('payment/index', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('payment/{payment}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::post('payment/update/{payment}', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('payment/delete/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
    Route::get('payment/{payment}', [PaymentController::class, 'status']);

    /*--Order Route--*/
    Route::get('order/index', [OrderController::class, 'index'])->name('order.index');
    Route::get('order/show/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::get('order/delete/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::get('order/{order}', [OrderController::class, 'status']);
});

/*--Frontend Routes Start--*/

Route::get('/', [HomeController::class, 'index']);
Route::get('product_view/{id}', [HomeController::class, 'product_view']);
Route::get('product_by_cat/{id}', [HomeController::class, 'cat_shop']);
Route::get('product_by_subcat/{id}', [HomeController::class, 'subcat_shop']);
Route::get('product_by_brand/{id}', [HomeController::class, 'brand_shop']);
Route::get('/search', [HomeController::class, 'search']);
Route::post('add-to-cart', [CartController::class, 'cart']);

Route::middleware('auth')->group(function(){
    Route::get('checkout',[CheckoutController::class, 'index']);
    Route::post('checkout_details',[CheckoutController::class, 'store']);
    Route::get('payment',[CheckoutController::class, 'payment']);
    Route::post('place_order',[CheckoutController::class, 'place_order']);

});

/*--Frontend Routes End--*/

Route::post('user/logout', [CategoryController::class, 'logout'])->name('user.logout');