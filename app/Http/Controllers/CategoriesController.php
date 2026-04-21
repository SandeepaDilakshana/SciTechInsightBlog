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
        return view('admin.categories.index')->with('categories',Category::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $category = Category::findOrFail($id);

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
        $category = Category::findOrFail($id);
        $category->delete();

        $notification = [
            'message' => 'Your category has been moved to trash successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('categories')->with($notification);
    }

    public function categorytrash()
    {
        $categories = Category::onlyTrashed()->latest()->paginate(10);
        return view('admin.categories.trash', compact('categories'));
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

    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id)->restore();

        $notification = [
            'message' => 'Your category has been restored successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
