<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use stripe;
use illuminate\View\View;

class stripeController extends Controller
{
    // //
    // public function stripe()
    // {
    //     return view('stripe.stripe');
    // }
    // public function stripePost(Request $request)
    // {

    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     Stripe\Charge::create([
    //         "amount" => 100 * 100,
    //         "currency" => "usd",
    //         "source" => $request->stripeToken,
    //         "description" => "This payment is tested purpose"
    //     ]);

    //     Session::flash('success', 'Payment successful!');

    //     return back();
    // }


    public function stripe()
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51OWzEPC2ffevenpv5Dqfn7Lo3iwVBFpvCR9OLKDnUz90MQSQocz9BLEVyhOulCGIuCeOvCkbtHjmevuEAgq2nv5s00zsKGh7xD');


        $amount = 100;
        $amount *= 100;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'usd',
            'description' => 'This is description',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;
        // return ($intent);
        // die;
        return view('stripe.stripe', compact('intent'));
    }

    public function afterPayment()
    {
        echo 'Payment Received, Thanks you for using our services.';
    }

    // every user has charged id which will store in user table
}
