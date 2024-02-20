<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\product;
use App\Models\galery;

class HomeController extends Controller
{
    //
    public function redirect()
    {

        $usertype = Auth::user()->user_role;
        if ($usertype == 'admin') {
            // $category = category::with('subcategory')->get();

            return view('admin.home');
        } else {
            $category = category::with('subcategory')->get();
            $products = product::all();
            $gallery = galery::get();

            return view('front-end.welcome', compact('category','products','gallery'));
        }
    }

    public function show()
    {
        $category = category::with('subcategory')->get();
        $products = product::all();
        return view('front-end.welcome', compact('category', 'products'));
    }
}
