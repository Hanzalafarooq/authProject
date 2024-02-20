<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;


class categoryController extends Controller
{
    //
   public function category()
    {
        $category = category::get();
        return view('admin.category.category',compact('category'));
    }
    public function add_category()
    {

        return view('admin.category.add_category');
    }
     public function store(Request $request)
    {
           $category = new category;
        $category->category_name = $request->category_name;
        $category->save();
        return Redirect()->route("category")->with('success', 'product added successfully');
    }
     public function edit($id)
    {
        //
        $category = category::find($id);
return view('admin.category.add_category',compact('category'));
    }
     public function update(Request $request, $id)
    {
        //
        $category = category::find($id);
        $category->category_name = $request->category_name;
        $category->update();
        return Redirect()->route("category")->with('success', 'product added successfully');


    }
     public function destroy($id)
    {
        //
        category::destroy($id);
        return Redirect()->back()->with('success', 'Faq deleted successfully');

    }
}