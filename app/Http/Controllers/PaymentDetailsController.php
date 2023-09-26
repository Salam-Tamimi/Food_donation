<?php

namespace App\Http\Controllers;

use App\Models\UserDonation;
use App\Models\User;
use App\Models\PaymentDetails;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaymentDetailsController extends Controller
{
    public function payment(Request $request)
    {

        // Validation (example)
        $request->validate([
            'donation-phone' => 'required|regex:/^07\d{8}$/',
            'donation-address' => 'required|string',
        ], [
            'donation-phone.required' => 'Please enter your phone number.',
            'donation-phone.regex' => 'Please enter a valid phone number as 07XXXXXXXX.',
            'donation-address.required' => 'Please enter your address.',
            'donation-address.string' => 'The address must be a valid string.',
        ]);


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal_success'),
                "cancel_url" => route('paypal_cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ]
        ]);

        $user_idd = auth()->user()->id;

        User::where('id', $user_idd)->update([
            'mobile' => $request->input('donation-phone'),
            'address' => $request->input('donation-address')
        ]);

        $userDonation = new UserDonation();
        $userDonation->user_id = $user_idd;
        $userDonation->donation_id = $request->input('donation_id');
        $userDonation->total = $request->input('donationPrice') * $request->input('quantity');
        $userDonation->quantity = $request->input('quantity');
        $userDonation->save();

        // dd($response);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal_cancel');
        }
        // return redirect('/');
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        // dd($response);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect('/')->with('success', 'Your donation has been submit successfully!');
            ;
        } else {
            return redirect()->route('paypal_cancel');
        }
    }

    public function cancel()
    {
        return redirect('/')->withErrors(['msg' => 'Your donation has been submit successfully!']);
    }

    public function store(Request $request)
    {
    }
}