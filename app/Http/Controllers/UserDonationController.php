<?php

namespace App\Http\Controllers;

use App\Models\UserDonation;
use App\Models\User;
use App\Models\PaymentDetails;
use Illuminate\Http\Request;

class UserDonationController extends Controller
{
    public function index()
    {
        $userDonation=UserDonation::get();

        return view('dashboard.user-donations.index',compact('userDonation'));
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
        ],[
            'donation-phone.required' => 'Please enter your phone number.',
            'donation-phone.regex' => 'Please enter a valid phone number as 07XXXXXXXX.',
            'donation-address.required' => 'Please enter your address.',
            'donation-address.string' => 'The address must be a valid string.',
        ]);

        $user = new User();
        $user->mobile = $request->input('donation-phone');
        $user->address = $request->input('donation-address');
        $user->password = bcrypt('1234'); // Hash the password securely

        $userDonation=new UserDonation();
        $userDonation->user_id=$request->input('user_id');
        $userDonation->donation_id=$request->input('donation_id');
        $userDonation->quantity= $request->input('quantity');
        $userDonation->description= $request->input('textarea');
        $userDonation->save();

        return redirect('/');
    }

    public function show(UserDonation $userDonation)
    {
        //
    }

    public function edit(UserDonation $userDonation)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if($id == 2)
        {
            $request->validate([
                'donation-phone' => 'required|regex:/^07\d{8}$/',
                'donation-address' => 'required|string',
                'quantity' => 'required|numeric|min:5'
            ], [
                'donation-phone.required' => 'Please enter your phone number.',
                'donation-phone.regex' => 'Please enter a valid phone number as 07XXXXXXXX.',
                'donation-address.required' => 'Please enter your address.',
                'donation-address.string' => 'The address must be a valid string.',
            ]);
        }
        else{
            $request->validate([
                'donation-phone' => 'required|regex:/^07\d{8}$/',
                'donation-address' => 'required|string',
                'quantity' => 'required|numeric|min:1'
            ], [
                'donation-phone.required' => 'Please enter your phone number.',
                'donation-phone.regex' => 'Please enter a valid phone number as 07XXXXXXXX.',
                'donation-address.required' => 'Please enter your address.',
                'donation-address.string' => 'The address must be a valid string.',
            ]);
        }
        

        $user_idd = auth()->user()->id;

        User::where('id', $user_idd)->update([
            'mobile' => $request->input('donation-phone'),
            'address' => $request->input('donation-address')
        ]);

            $userDonation = new UserDonation();
            $userDonation->user_id = $user_idd;
            $userDonation->donation_id = $request->input('donation_id');
            $userDonation->description = $request->input('textarea');
            $userDonation->quantity = $request->quantity;
            $userDonation->save();

        return redirect('/')->with('success', 'Your donation has been submit successfully!');

    }

    public function destroy(UserDonation $userDonation)
    {
        //
    }
}
