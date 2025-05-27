<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class DonationController extends Controller
{
    public function show()
    {
        return view('donate');
    }

    public function checkout(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Sponsoring UFO Meldpunt',
                    ],
                    'unit_amount' => $request->amount * 100, // bv €10,00 => 1000
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('donate.success'),
            'cancel_url' => route('donate.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        return 'Bedankt voor je steun! ✨';
    }

    public function cancel()
    {
        return 'Je betaling is geannuleerd.';
    }
}
