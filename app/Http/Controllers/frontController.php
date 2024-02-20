<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\size;
use App\Models\color;
use App\Models\galery;
use App\Models\product;
class frontController extends Controller
{
    public function home()
    {
        $category = category::with('subcategory')->get();

        $gallery = galery::get();
        $products = Product::all();
        return view('front-end.welcome',compact('category','gallery','products'));
    }
    public function productList()
    {
        $category = category::with('subcategory')->get();

        // $gallery = galery::get();
        $products = Product::all();
        return view('front-end.product', compact('category', 'products'));
    }
    public function productdetail($id)
    {


        $product = Product::find($id);
$gallery = galery::where('pid',$id)->get();
        $sizes = size::all();
        $colors = color::all();
return view('front-end.product-detail',compact('product','gallery','colors','sizes'));
    }
    public function carts()
    {
        return view('front-end.cart');
}
}
