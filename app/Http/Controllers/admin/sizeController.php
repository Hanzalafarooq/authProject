<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\size;

class sizeController extends Controller
{
    //
       public function size()
    {
        $size = size::get();
        return view('admin.size.size',compact('size'));
    }
    public function add_size()
    {
        //    $size = new size;
        // $size->size_name = $request->size_name;
        // $size->save();
        return view('admin.size.add_size');
        // return Redirect()->route("admin.add_size")->with('success', 'product added successfully');
    }
     public function store(Request $request)
    {
           $size = new size;
        $size->size_name = $request->size_name;
        $size->save();
        // return view('admin.size.add_size');
        return Redirect()->route("size")->with('success', 'product added successfully');
    }
     public function edit($id)
    {
        //
        $size = size::find($id);
return view('admin.size.add_size',compact('size'));
    }
     public function update(Request $request, $id)
    {
        //
        $size = size::find($id);
        $size->size_name = $request->size_name;
        $size->update();
        return Redirect()->route("size")->with('success', 'product added successfully');


    }
     public function destroy($id)
    {
        //
        size::destroy($id);
        return Redirect()->back()->with('success', 'Faq deleted successfully');

    }
}