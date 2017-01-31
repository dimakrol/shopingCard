<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\{Stripe, Charge, Customer};


class PurchasesController extends Controller
{

    public function store(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $customer = Customer::create([
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken
        ]);

        Charge::create([
            'customer' => $customer->id,
            'amount' => 1000,
            'currency' => 'usd'
        ]);

        return 'Done';
    }

    public function checkout(Request $request)
    {
        return $request->all();
    }
}
