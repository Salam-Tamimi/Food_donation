<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs=Job::get();
        // dd($admins);
        return view('dashboard.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('dashboard.jobs.create');
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => 'required',

        ]);
    
        Job::create($validatedData);
    
        return redirect()->route('jobs.index')->with('success', 'Job created successfully');
    }

    public function show(Job $job)
    {
        //
    }
    

    public function edit($id)
    {
        $jobs = Job::findOrFail($id);
        // dd($categories);

        return view('dashboard.jobs.edit', compact('jobs'));
    }

    public function update(Request $request, Job $job)
    {
        $validatedData=$request->validate([
            'name' => 'required',
        ]);

        $job->update($validatedData);
    
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

    public function destroy($id)
    {
        Job::destroy($id);
        return back()->with('success', 'Job deleted successfully.');
    }
}
