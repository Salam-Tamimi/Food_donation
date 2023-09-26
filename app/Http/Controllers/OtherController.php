<?php

namespace App\Http\Controllers;
use App\Models\UserDonation;
use App\Models\User;
use App\Models\PaymentDetails;
use App\Models\Donation;


use App\Models\Other;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OtherController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'donation-phone' => 'required|regex:/^07\d{8}$/',
            'donation-address' => 'required|string',
            'description' => 'required',
        ], [
            'donation-phone.required' => 'Please enter your phone number.',
            'donation-phone.regex' => 'Please enter a valid phone number as 07XXXXXXXX.',
            'donation-address.required' => 'Please enter your address.',
            'donation-address.string' => 'The address must be a valid string.',
            'description.required' => 'Please provide some additional information.',

        ]);
        $user_idd = auth()->user()->id;

        User::where('id', $user_idd)->update([
            'mobile'=>$request->input('donation-phone'),
            'address'=>$request->input('donation-address')
        ]);

        $other = new Other();
        $other->user_id = $user_idd;
        $other->content = $request->input('description');
        $other->save();

        return redirect('/')->with('success', 'Your donation has been submit successfully!');
    }

    public function show()
    {
        // $singleDonation = Donation::where('id', $id)->first();
        if (Auth::check()) {
            return view('Pages.other');
        } else {

            return view('auth.login');
        }

    }

    public function edit(Other $other)
    {
        //
    }

    public function update(Request $request, Other $other)
    {
        //
    }

    public function destroy(Other $other)
    {
        //
    }
}
