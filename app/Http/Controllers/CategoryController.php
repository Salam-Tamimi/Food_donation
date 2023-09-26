<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::get();
        // dd($admins);
       return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
        
    }

    public function store(Request $request)
    
    {
        $relativeImagePath = null; // Initialize relativeImagePath as null

        $newImageName = uniqid() . '-' . $request->addedCategoryName . '.' . $request->file('image')->extension();
        //This line generates a unique image name by combining a unique identifier, the category name (from the request), and the file extension of the uploaded image.
        $relativeImagePath = 'assets/images/' . $newImageName;
        //This line constructs the relative path where the uploaded image will be stored within the public directory. It combines the 'assets/images/' directory with the unique image name.
        $request->file('image')->move(public_path('assets/images'), $newImageName);
        //This line moves the uploaded image file to the specified directory (in this case, public/assets/images) using the generated unique image name.

        // Validate and store the new employee record
        $request->validate([
        'name' => 'required',
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,jfif |max:2048',
        'description' => 'required',
        
    ]);

    Category::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'image' => $relativeImagePath,
    ]);
   // This code creates a new category record using Laravel's Eloquent ORM. It assigns the 'name' and 'description' values from the request data and sets the 'image' column to the previously calculated $relativeImagePath.

    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        // dd($categories);

        return view('dashboard.categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $data = $request->except(['_token', '_method']);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            $newImage = $this->storeImage($request);

            // Update the image column only if a new image was uploaded
            $data['image'] = $newImage;
        }

        Category::where('id', $id)->update($data);


        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return back()->with('success', 'Category deleted successfully.');
    }

    // handle only the image upload part
    //This method takes the request as an argument, generates a unique image name, moves the uploaded image to the specified directory, and returns the relative path to the image. This can be useful if you need to perform image uploads in multiple places within your application and want to reuse the image upload logic.
    public function storeImage($request)
    {
        $newImageName = uniqid() . '-' . $request->addedCategoryName . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);


        return $relativeImagePath;

    }
}