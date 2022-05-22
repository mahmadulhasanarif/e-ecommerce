<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify'=> true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('is_admin')->group(function(){
    /*--Category Route--*/
    Route::resource('category', CategoryController::class)->except('show', 'update', 'edit');
    Route::get('/category_status/{category}', [CategoryController::class, 'status']);

    /*--Sub Category Route--*/
    Route::resource('subcategory', SubCategoryController::class)->except('show');
    Route::get('/subcategory_status/{subcategory}', [SubCategoryController::class, 'status']);

    /*--Unit Route--*/
    Route::resource('unit', UnitController::class);

    /*--size Route--*/
    Route::resource('size', SizeController::class);
    Route::get('/size_status/{size}', [SizeController::class, 'status']);

    /*--Color Route--*/
    Route::resource('/color', ColorController::class);
    Route::get('/color_status/{color}', [ColorController::class, 'status']);

    /*--Product Route--*/
    Route::resource('product', ProductController::class);
    Route::get('/product_status/{product}', [ProductController::class, 'status']);

    Route::resource('brand', BrandController::class);
    Route::resource('admin', AdminController::class)->except('show');

    //order//
    Route::get('/order_manage', [OrderController::class, 'order_manage']);
    Route::get('/order_view/{id}', [OrderController::class, 'show'])->name('show.order');
    Route::get('/order_status/{order}', [OrderController::class, 'order_status']);


    Route::view('chart', 'admin.chart.chart')->name('chart');
    Route::view('datamap', 'admin.chart.datamap')->name('datamap');
    Route::view('error', 'admin.page.404')->name('error');
    Route::view('deshboard', 'admin.deshboard.deshboard');
    Route::view('deshboard/default', 'admin.deshboard.default');
    Route::view('deshboard/earning', 'admin.deshboard.sass');
    Route::view('table', 'admin.table.table');
});

// forntend Route//
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
