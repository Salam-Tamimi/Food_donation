<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('Pages.contact-us');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        return redirect()->back()
            ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }
}