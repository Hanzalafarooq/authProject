<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontController;
use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\colorController;
use App\Http\Controllers\admin\sizeController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\subcategoryController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\stripeController;

// use DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('front-end.welcome')->with(compact(''));
// });

route::get('/', [HomeController::class, 'show']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/redirect', [HomeController::class, 'redirect']);
// route::get('/redirect/about',[HomeController::class,'about'])->name('about');
Route::get('/hom', [frontController::class, 'home'])->name('home');
Route::get('/front/product', [frontController::class, 'productList'])->name('products.list');
Route::get('/product/details/{id}', [frontController::class, 'productdetail'])->name('product.details');
// Route::get('/product', [frontController::class,'productList'])->name('products.list');


// admin side
// brand add
Route::get('/brand', [brandController::class, 'brand'])->name('brand');
Route::get('/add/brand', [brandController::class, 'add_brand'])->name('admin.add_brand');
Route::post('/brand/store', [brandController::class, 'store'])->name('admin.store.brand');
Route::get('/brand/edit/{id}', [brandController::class, 'edit'])->name('admin.brand.edit');
Route::get('/brand/destroy/{id}', [brandController::class, 'destroy'])->name('admin.brand.destroy');
Route::post('/brand/update-brand/{id}', [brandController::class, 'update'])->name('admin.brand.update');

//add color
Route::get('/color', [colorController::class, 'color'])->name('color');
Route::get('/add/color', [colorController::class, 'add_color'])->name('admin.add_color');
Route::post('/color/store', [colorController::class, 'store'])->name('admin.store.color');
Route::get('/color/edit/{id}', [colorController::class, 'edit'])->name('admin.color.edit');
Route::get('/color/destroy/{id}', [colorController::class, 'destroy'])->name('admin.color.destroy');
Route::post('/color/update-color/{id}', [colorController::class, 'update'])->name('admin.color.update');

// add size
Route::get('/size', [sizeController::class, 'size'])->name('size');
Route::get('/add/size', [sizeController::class, 'add_size'])->name('admin.add_size');
Route::post('/size/store', [sizeController::class, 'store'])->name('admin.store.size');
Route::get('/size/edit/{id}', [sizeController::class, 'edit'])->name('admin.size.edit');
Route::get('/size/destroy/{id}', [sizeController::class, 'destroy'])->name('admin.size.destroy');
Route::post('/size/update-size/{id}', [sizeController::class, 'update'])->name('admin.size.update');

// add category
Route::get('/category', [categoryController::class, 'category'])->name('category');
Route::get('/add/category', [categoryController::class, 'add_category'])->name('admin.add_category');
Route::post('/category/store', [categoryController::class, 'store'])->name('admin.store.category');
Route::get('/category/edit/{id}', [categoryController::class, 'edit'])->name('admin.category.edit');
Route::get('/category/destroy/{id}', [categoryController::class, 'destroy'])->name('admin.category.destroy');
Route::post('/category/update-category/{id}', [categoryController::class, 'update'])->name('admin.category.update');

// add subcategory
Route::get('/subcategory', [subcategoryController::class, 'subcategory'])->name('subcategory');
Route::get('/add/subcategory', [subcategoryController::class, 'add_subcategory'])->name('admin.add_subcategory');
Route::post('/subcategory/store', [subcategoryController::class, 'store'])->name('admin.store.subcategory');
Route::get('/subcategory/edit/{id}', [subcategoryController::class, 'edit'])->name('admin.subcategory.edit');
Route::get('/subcategory/destroy/{id}', [subcategoryController::class, 'destroy'])->name('admin.subcategory.destroy');
Route::post('/subcategory/update-subcategory/{id}', [subcategoryController::class, 'update'])->name('admin.subcategory.update');

// add product
Route::get('/product', [productController::class, 'show'])->name('product.show');
Route::post('/product/store', [productController::class, 'productstore'])->name('product.store');
Route::get('/getsubcategories', [productController::class, 'getSubcategories']);

// cart
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart/get', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

// addding discount
Route::post('/apply-discount', [CartController::class, 'applyDiscount'])->name('apply-discount');
Route::post('/clear-discount', [CartController::class, 'clearDiscount'])->name('clear-discount');

// checckout
Route::post('/check', [checkoutController::class, 'checkout'])->name('checkout.view');
Route::get('/thank', [checkoutController::class, 'thanku'])->name('thanks.view');
Route::any('/checks', [checkoutController::class, 'checkouts'])->name('checkout.views');
// order route
Route::post('/order', [checkoutController::class, 'store'])->name('storedata');

// stripe route
Route::get('stripe', [stripeController::class, 'stripe']);
Route::post('stripe', [stripeController::class, 'stripePost'])->name('stripe.post');


Route::get('checkout', 'App\Http\Controllers\stripeController@stripe')->name('stripe');
Route::post('checkout', 'App\Http\Controllers\stripeController@afterpayment')->name('checkout.credit-card');
