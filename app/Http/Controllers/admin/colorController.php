<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\color;

class colorController extends Controller
{
    //
      public function color()
    {
        $color = color::get();
        return view('admin.color.color',compact('color'));
    }
    public function add_color()
    {
        //    $color = new color;
        // $color->color_name = $request->color_name;
        // $color->save();
        return view('admin.color.add_color');
        // return Redirect()->route("admin.add_color")->with('success', 'product added successfully');
    }
     public function store(Request $request)
    {
           $color = new color;
        $color->color_name = $request->color_name;
        $color->save();
        // return view('admin.color.add_color');
        return Redirect()->route("color")->with('success', 'product added successfully');
    }
     public function edit($id)
    {
        //
        $color = color::find($id);
return view('admin.color.add_color',compact('color'));
    }
     public function update(Request $request, $id)
    {
        //
        $color = color::find($id);
        $color->color_name = $request->color_name;
        $color->update();
        return Redirect()->route("color")->with('success', 'product added successfully');


    }
     public function destroy($id)
    {
        //
        color::destroy($id);
        return Redirect()->back()->with('success', 'Faq deleted successfully');

    }
}