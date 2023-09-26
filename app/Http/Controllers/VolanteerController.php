<?php

namespace App\Http\Controllers;

use App\Models\Volanteer;
use Illuminate\Http\Request;

class VolanteerController extends Controller
{
    public function index()
    {
        $volanteers=Volanteer::get();
        // dd($admins);
        return view('dashboard.volanteers.index', compact('volanteers'));
    }

    public function create()
    {
        return view('dashboard.volanteers.create');
        
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => 'required',
            'email' => 'required',
            'job' => 'required',
            'comments' => 'required',
            'mobile' => ['required', 'regex:/^(079|078|077)\d{7}$/'],

        ]);
    
        Volanteer::create($validatedData);
    
        return redirect()->route('volanteers.index')->with('success', 'Volanteer created successfully');
    }

    public function show(Volanteer $volanteer)
    {
        //
    }

    public function edit($id)
    {
        $volanteers = Volanteer::findOrFail($id);
        // dd($categories);

        return view('dashboard.volanteers.edit', compact('volanteers'));
    }

    public function update(Request $request, Volanteer $volanteer)
    {
        $validatedData=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'job' => 'required',
            'comments' => 'required',
            'mobile' => 'required',
        
        ]);
    
        $volanteer->update($validatedData);
        return redirect()->route('volanteers.index')->with('success', 'Volanteer updated successfully'); 
    }


    public function destroy($id)
    {
        Volanteer::destroy($id);
        return back()->with('success', 'Volanteer deleted successfully.');
    }
}
