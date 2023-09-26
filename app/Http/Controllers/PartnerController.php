<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners=Partner::get();
        // dd($admins);
        return view('dashboard.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('dashboard.partners.create');
    }

    public function store(Request $request)
    {
        $relativeImagePath = null; // Initialize relativeImagePath as null

        $newImageName = uniqid() . '-' . $request->input('name') . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);
        $validatedData =  $request->validate([
            'name' => 'required',
        ]);

    
        Partner::create([
            'name' => $request->input('name'),
            'image' => $relativeImagePath,
        ]);
    
        return redirect()->route('partners.index')->with('success', 'Partner created successfully');
    }

    public function show(Partner $partner)
    {
        //
    }

    public function edit($id)
    {
        $partners = Partner::findOrFail($id);
        // dd($categories);

        return view('dashboard.partners.edit', compact('partners'));
    }

    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'name' => 'required',
            // 'image' => 'required',
        ]);

        $data = $request->except(['_token', '_method']);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) 
        {
            $newImage = $this->storeImage($request);

            // Update the image column only if a new image was uploaded
            $data['image'] = $newImage;
        }

        Partner::where('id', $id)->update($data);
    
        return redirect()->route('partners.index')->with('success', 'Partner updated successfully');
    }

    public function destroy($id)
    {
        Partner::destroy($id);
        return back()->with('success', 'Partner deleted successfully.');
    }

    public function storeImage($request)
        {
        $newImageName = uniqid() . '-' . $request->addedCategoryName . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);


        return $relativeImagePath;

    }
}
