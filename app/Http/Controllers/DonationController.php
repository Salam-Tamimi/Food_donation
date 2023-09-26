<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Donation;
use App\Models\MenuItem;
use App\Models\User;
use App\Models\UserDonation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::get();
        $category = Category::all();
        // dd($categoryName);
        return view('dashboard.donations.index', compact('donations', 'category'));
    }

    public function create(Request $request)
    {
        $categoryNames = Category::get();

        // $categories= $donations->category->name;
        return view('dashboard.donations.create', compact('categoryNames'));
    }

    public function store(Request $request)
    {
        $relativeImagePath = null; // Initialize relativeImagePath as null

        $newImageName = uniqid() . '-' . $request->name . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => [
                'required',
                'regex:/^\d{1,3}(\.\d{1,2})?$/',
            ],
        ]);


        Donation::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image' => $relativeImagePath,
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('donations.index')->with('success', 'Donation created successfully.');
    }

    public function show($id)
    {
        if (auth()->check()) {

            $donation = Donation::where('id', $id)->first();
            return view('Pages.money-donation', [
                'donations' => $donation,
            ]);
        }else {
            return view('auth.login');
        }

    }
    public function shows($id)
    {
        if (auth()->check()) {
            $donation = Donation::where('id', $id)->first();

            return view('Pages.food-donation', [
                'donations' => $donation,
            ]);
        } else {
            return view('auth.login');
        }
    }
    // /-Show Method to display the Single Donation Details in 'Single.blade.php'-/
    public function show2($id)
    {
        $singleDonation = Donation::where('id', $id)->first();
        // dd($singleDonation);
        return view('Pages.single', compact('singleDonation'));

    }
    public function show3($id)
    {
        $singleDonation = Donation::where('id', $id)->first();
        // dd($singleDonation);
        return view('Pages.coupons', compact('singleDonation'));

    }
    public function showw($id)
    {

        $donations = Donation::where('category_id', $id)->paginate(6);
        return view('pages/sub-category', compact('donations'));
    }

    public function edit($id)
    {
        $donations = Donation::findOrFail($id);

        return view('dashboard.donations.edit', compact('donations'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            // 'image' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $data = $request->except(['_token', '_method']);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            $newImage = $this->storeImage($request);

            // Update the image column only if a new image was uploaded
            $data['image'] = $newImage;
        }

        Donation::where('id', $id)->update($data);

        return redirect()->route('donations.index')->with('success', 'Donation updated successfully');
    }

    public function destroy($id)
    {
        Donation::destroy($id);
        return back()->with('success', 'Donation deleted successfully.');
    }

    public function storeImage($request)
    {
        $newImageName = uniqid() . '-' . $request->addedCategoryName . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);


        return $relativeImagePath;

    }
}