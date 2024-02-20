<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subcategory;
use App\Models\category;


class subcategoryController extends Controller
{
    //
 public function subcategory()
    {
        // $subcategory = subcategory::get();
    $subcategory = subcategory::with('category')->get();
    // return $subcategory;die;

        return view('admin.subcategory.subcategory',compact('subcategory'));
    }
    public function add_subcategory()
    {

$subcategory = subcategory::find('id');
        // $subcategory = subcategory::get();
        // return $subcategory;die;
        $categorys = category::get();

    // $subcategory = subcategory::with('category')->get();
// return $subcategory;die;
        return view('admin.subcategory.add_subcategory',compact('subcategory','categorys'));
    }
     public function store(Request $request)
    {

           $subcategory = new subcategory;
    $subcategory->category_id = $request->main_category;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->save();
        return Redirect()->route("subcategory")->with('success', 'product added successfully');
    }
     public function edit($id)
    {
        //
        $subcategory = subcategory::find($id);
        $categorys = category::get();

return view('admin.subcategory.add_subcategory',compact('subcategory','categorys'));
    }
     public function update(Request $request, $id)
    {
        //
        $subcategory = subcategory::find($id);
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->update();
        return Redirect()->route("subcategory")->with('success', 'product added successfully');


    }
     public function destroy($id)
    {
        //
        subcategory::destroy($id);
        return Redirect()->back()->with('success', 'Faq deleted successfully');

    }
}
