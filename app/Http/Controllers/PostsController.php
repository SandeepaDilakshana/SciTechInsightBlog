<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'featured' => 'required|image|mimes:jpg,png,jpeg,gif',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = new Post;

        $post->title = $request->title;
        $post->featured = 'uploads/posts/'.$featured_new_name;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->attach($request->tags);  // attach() available with pivot tables in laravel
                                                // and also this should code after saving the post.
        $notification = [
            'message' => 'Your post created Successfully !',
            'alert-type' => 'success',
        ];

        return redirect()->route('posts')->with($notification);
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
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        if ($request->hasFile('featured')) {
            $image = $request->featured;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/posts/', $image_new_name);

            if ($post->featured && file_exists(public_path($post->featured))) {
                unlink(public_path($post->featured));
            }

            $post->featured = 'uploads/posts/'.$image_new_name;
        }

        $post->save();

        $post->tags()->sync($request->tags); //updates the pivot table

        $notification = [
            'message' => 'Your post updated Successfully !',
            'alert-type' => 'success',
        ];

        return redirect()->route('posts')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        $notification = [
            'message' => 'Your post has been moved to trash successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('posts')->with($notification);
    }

    public function posttrash()
    {
        $posts = Post::onlyTrashed()->latest()->paginate(10);

        return view('admin.posts.trash', compact('posts'));
    }

    public function deleteforever($id)
    {
        $post = Post::withTrashed()->find($id);

        if ($post) {
            $post->forceDelete();
        }

        $notification = [
            'message' => 'Your post has been deleted successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function restore($id)
    {
        $posts = Post::onlyTrashed()->find($id)->restore();

        $notification = [
            'message' => 'Your post has been restored successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
