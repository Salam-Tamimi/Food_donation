<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users=User::get();
        // dd($users);
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile' => ['required', 'regex:/^(079|078|077)\d{7}$/'],
            'address' => 'required',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ]
        ]);
        
        $users = new User();

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->mobile = $request->input('mobile');
        $users->address = $request->input('address');
        $users->password = Hash::make ($request->input('password'));

        $users->save();

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        
        $users = User::findOrFail($id);
        // dd($users);

        return view('dashboard.users.edit', compact('users'));
    }

    public function update(Request $request, User $users , $id)
    {
        $users = User::findOrFail($id);

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make ($request->input('password'));
        $users->mobile = $request->input('mobile');
        $users->address = $request->input('address');
        
        $users->save();        

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return back()->with('success', 'User deleted successfully.');
    }
}
