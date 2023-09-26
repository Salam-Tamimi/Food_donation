<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function index()
    {
        $admins=Admin::get();
        // dd($admins);
        return view('dashboard.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('dashboard.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ]
        ]);

        $admins = new Admin();

        $admins->name = $request->input('name');
        $admins->email = $request->input('email');
        $admins->password = Hash::make ($request->input('password'));

        $admins->save();

        return redirect()->route('admins.index')->with('success', 'Admin created successfully');
    }

    public function show(Admin $admin)
    {
        //
    }

    public function edit($id)
    {
        
        $admins = Admin::findOrFail($id);
        // dd($admins);

        return view('dashboard.admins.edit', compact('admins'));
    }

    public function update(Request $request, Admin $admins , $id)
    {
        $admins = Admin::findOrFail($id);
        $admins->name = $request->input('name');
        $admins->email = $request->input('email');
        $admins->password = Hash::make ($request->input('password'));
        
        
        try {
            $admins->save();
        } catch (\Exception $e) {
            // Log or dd the exception to see the error message
            dd($e->getMessage());
        }



        return redirect()->route('admins.index')->with('success', 'Admin updated successfully');
    }

    public function destroy($id)
    {
        Admin::destroy($id);
        return back()->with('success', 'Admin deleted successfully.');
    }
}
