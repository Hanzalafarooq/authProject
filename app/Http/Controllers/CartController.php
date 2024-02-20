<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Session;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        // return $cartItems;die();
        return view('front-end.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)

    {
        // echo "<pre>";
        // print_r($request->all());
         // return $request->all();die;

        // echo "</pre>";die;

        $validatedData = $request->validate([
            'id' => 'required',
            'name' => 'required',
            // 'price' => 'required|numeric',
            'price' => 'required|numeric',
            // 'desc' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required',
        ]);

        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            // 'price' => $request->price,
            // 'discountprice' => $request->discountedPrice,
            // 'discount' => $request->discountedPrice,

            'quantity' => $request->quantity,
            'price' => $request->price,
            'attributes' => array(
                'image' => $request->image,

                // 'desc' => $request->desc,
            )
        ]);
        // return session()->all();die;
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        // dd(Cart::getTotal());
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]

        );


        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }
    public function applyDiscount(Request $request)
    {
        $discount = $request->input('discount');
        // dd($discount);die;
        // Calculate discounted total
        session(['discount' => $discount]);
        $total = \Cart::getTotal();
        $discountedTotal = $total - $discount;
        // dd($total);
        // dd($discountedTotal);
        // dd(session()->all());
        // Store discount in session (optional)
        $request->session()->put('discount', $discount);

        return redirect()->route('cart.list')->with('success', 'Discount applied successfully.');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        // Session::flush();
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        Session::flush();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
