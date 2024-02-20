<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


use App\Models\color;
use App\Models\size;
use App\Models\brand;
use App\Models\subcategory;
use App\Models\category;
use App\Models\product;
use App\Models\galery;
// use Termwind\Components\Dd;

class productController extends Controller
{
    //
    public function show()
    {
        $category = Category::all();
        $subcategory = subCategory::all();
        $brands = Brand::all();
        $color = Color::all();
        $size = size::all();
        // ret
        return view('admin.product.add_product', compact('category', 'subcategory', 'brands', 'color', 'size'));
    }
    public function getsubcategories(Request $request)
    {

        $id = $request->cat_id;
        // dd($id);
        $subcategories = Subcategory::where('category_id', $id)->get();
        return response()->json($subcategories);
    }

    public function productstore(Request $request)
    {
        // dd($request);die;
        //     echo '<pre>';
        //    echo $request;
        //     echo '</pre>';die;

        $product = new product();

        $product->title = $request->input('title');
        $product->category_id = $request->input('category');
        $product->subcategory_id = $request->input('subcategory');
        $product->brand_id = $request->input('brand');
        $product->color_id = $request->input('color');
        $product->size_id = $request->input('size');
        $product->weight = $request->input('weight');
        $product->price = $request->input('price');
        $product->discounted_price = $request->input('discountedPrice');
        $product->description = $request->input('description');
        // $imageData = $request->image;

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move('products/img', $filename);
            $product->image = $filename;
        }


        // $imageName = time() . '.' . $request->image->getClientOriginalExtension();

        // $request->image->move(public_path('product_images'), $imageName);

        // $product->image = $imageName;

        //    dd($photo);
        // }
        // $product->image = $imageData;
        $product->save();



        $pr_id = $product->id;
        $var = $request->gallery;
        //    dd($var);exit;
        // dd($pr_id);exit;




        foreach ($var as $gale) {
            $gal = new galery;

            $gal->pid = $pr_id;
            // dd($gale->getClientOriginalName());
            $galleryFilename = uniqid() . "." . $gale->getClientOriginalExtension();
            $gal->gallery = $galleryFilename;
            // dd($galleryFilename);
            $gale->move('products/gallery', $galleryFilename);
            $gal->save();
        }
        return redirect('/product');
    }
}
