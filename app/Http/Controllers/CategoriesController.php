<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $category = new Category;

        $category->name = $request->name;
        $category->save();

        $notification = [
            'message' => 'New category created Successfully !',
            'alert-type' => 'success'
        ];

        return redirect()->route('categories')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        

        return view('admin.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->save();

        $notification = [
            'message' => 'Your category updated Successfully !',
            'alert-type' => 'success'
        ];

        return redirect()->route('categories')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        $notification = [
            'message' => 'Your category has been moved to trash successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('categories')->with($notification);
    }


    public function deleteforever($id)
    {
        $category = Category::withTrashed()->find($id);

        if ($category) {
            $category->forceDelete();
        }

        $notification = [
            'message' => 'Your category has been deleted successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
