<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;


class brandController extends Controller
{
    //
    public function brand()
    {
        $brand = brand::get();
        return view('admin.brand.brand',compact('brand'));
    }
    public function add_brand()
    {
        //    $brand = new brand;
        // $brand->brand_name = $request->brand_name;
        // $brand->save();
        return view('admin.brand.add_brand');
        // return Redirect()->route("admin.add_brand")->with('success', 'product added successfully');
    }
     public function store(Request $request)
    {
           $brand = new brand;
        $brand->brand_name = $request->brand_name;
        $brand->save();
        // return view('admin.brand.add_brand');
        return Redirect()->route("brand")->with('success', 'product added successfully');
    }
     public function edit($id)
    {
        //
        $brand = brand::find($id);
return view('admin.brand.add_brand',compact('brand'));
    }
     public function update(Request $request, $id)
    {
        //
        $brand = brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->update();
        return Redirect()->route("brand")->with('success', 'product added successfully');


    }
     public function destroy($id)
    {
        //
        brand::destroy($id);
        return Redirect()->back()->with('success', 'Faq deleted successfully');

    }
}