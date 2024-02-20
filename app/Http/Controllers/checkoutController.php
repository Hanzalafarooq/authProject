<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\customer;
use App\Models\order_detail;
use App\Models\product;
use Illuminate\Http\Request;

class checkoutController extends Controller
{
    //
    public function checkout(Request $request)
    {
        // dd($request->all());die();
        $itemIds = $request->input('item_ids');
        $quantities = $request->input('quantities');
        $prices = $request->input('prices');
        // dd($itemIds, $quantities, $prices);


        return view('front-end.checkout')->with([
            'itemIds' => $itemIds,
            'quantities' => $quantities,
            'prices' => $prices,
        ]);
    }
    public function checkouts(Request $request)
    {
        $itemIds = $request->input('item_ids');
        $quantities = $request->input('quantities');
        $prices = $request->input('prices');

        // Process the data as needed (e.g., calculate the total price, save the order, etc.)

        return view('front-end.checkout')->with([
            'itemIds' => $itemIds,
            'quantities' => $quantities,
            'prices' => $prices,
        ]);;
    }
    public function thanku()
    {
        return view('front-end.thanks');
    }
    public function store(Request $request)
    {

        // return $request->subtotal;die;
        // dd($request->all());die;
        // Validate the form data (add validation rules as needed)
        $data =   $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',

        ]);
        // print_r( $data); die;
        //  Customer record
        $customer = new Customer([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),

        ]);
        // dd($customer);die;
        $customer->save();
        $customerId = $customer->id;
        // dd($orderId);die;

        $order = new Order;
        // Add order fields
        $order->country = $request->input('country');
        $order->state = $request->input('state');
        $order->city = $request->input('city');
        $order->address = $request->input('address');
        $order->subtotal = $request->subtotal;
        $order->discount = $request->discount;
        $order->grandtotal = $request->grandtotal;
        $order->zipcode = $request->input('zipcode');
        $order->customer_id = $customerId;



        $order->customer()->associate($customer);
        $order->save();
        $orderId = $order->id;

        $itemids = $request->itemid;

        $prices = $request->prices;
        $quantity = $request->quantity;
        $subtotals = $request->subtotals;


        // Create a new OrderDetail record (you can loop through products and add details)

        foreach ($itemids as $key => $value) {
            $orderDetail = new Order_detail;
            $orderDetail->item_id = $value;
            $orderDetail->order_id = $orderId;
            $orderDetail->price = $prices[$key];
            $orderDetail->quantity = $quantity[$key];
            $orderDetail->subtotal = $subtotals;
            $orderDetail->save();
            // dd( $request->itemid);
        }
        // die;
        // return $orderDetail;
        // echo "absolute";exit;
        // Redirect or perform other actions as needed
        // return redirect()->route('thanks.view');
        // return redirect(url('checkout'));
        return redirect(route('stripe'));
    }
    public function detail(Request $request)
    {
        $orders = order::with('customer')->get();
        // dd($orders);
        // $customer=customer::get();
        // return $orders;die;
        // dd($order);exit();
        // $products=product::get();
        // dd($products);
        return view('admin.order_detail', compact('orders'));
    }
    public function details(Request $request, $id)
    {
        // echo $id;die;
        $order = order_detail::with('product')->with('order')->where('order_id', $id)->get();
        // $orders=order::with('order_detail')->with('order')->where('order_id',$id)->get();
        // dd($orders);
        // $customer=customer::get();
        // return $order;die;
        // dd($order);exit();
        // $products=product::get();
        // dd($products);
        return view('admin.order-detail2', compact('order'));
    }

}
