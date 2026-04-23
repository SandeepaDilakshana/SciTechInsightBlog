<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tags.index')->with('tags', Tag::paginate(10));
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
            'tag' => 'required|string',
        ]);

        $tag = new Tag;

        $tag->tag = $request->tag;
        $tag->save();

        $notification = [
            'message' => 'New tag created Successfully !',
            'alert-type' => 'success',
        ];

        return redirect()->route('tags')->with($notification);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tag' => 'required|string|max:255',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->tag = $request->tag;
        $tag->save();

        $notification = [
            'message' => 'Tag updated successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('tags')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        $notification = [
            'message' => 'Your tag has been deleted successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('tags')->with($notification);
    }
}
