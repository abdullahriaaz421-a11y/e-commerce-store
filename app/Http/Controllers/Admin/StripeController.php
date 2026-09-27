<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Stripe;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return Response
     */
    public function stripe(): View
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return Response
     */
    public function stripePost(Request $request): RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            'amount'      => 10 * 100,
            'currency'    => 'usd',
            'source'      => $request->stripeToken,
            'description' => 'Test payment from itsolutionstuff.com.',
        ]);

        return back()
            ->with('success', 'Payment successful!');
    }
}
