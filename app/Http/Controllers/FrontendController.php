<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $posts = Post::with('user')->orderBy('created_at', 'desc')->take(3)->get();

        return view('frontend.home')->with('title', $setting->site_name)
            ->with('first_post', $posts->get(0))
            ->with('second_post', $posts->get(1))
            ->with('third_post', $posts->get(2));
    }

    public function contact()
    {
        return view('frontend.contact')->with('address', Setting::first()->address)
            ->with('contact_number', Setting::first()->contact_number)
            ->with('contact_email', Setting::first()->contact_email);
    }

    public function about()
    {
        $postCount = Post::count();
        $categoryCount = Category::count();
        $tagCount = Tag::count();
        $userCount = User::count();

        return view('frontend.about', compact('postCount', 'categoryCount', 'tagCount', 'userCount'));
    }

    public function blog(Request $request)
    {
        $query = Post::with(['user', 'category'])->orderBy('created_at', 'desc');

        if ($request->has('q')) {
            $search = $request->get('q');
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%");
        }

        $posts = $query->paginate(8);

        return view('frontend.blog')->with('posts', $posts);
    }

    public function blogDetails($slug)
    {
        $post = Post::with(['user', 'category', 'tags'])->where('slug', $slug)->firstOrFail();

        return view('frontend.blog_details')->with('post', $post);
    }
}
