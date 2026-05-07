<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home')->with('title', Setting::first()->site_name)
            ->with('first_post', Post::orderBy('created_at', 'desc')->first())
            ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
            ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first());
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

    public function blog()
    {
        return view('frontend.blog')->with('first_post', Post::orderBy('created_at', 'desc')->first())
            ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
            ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first());
    }

    public function blogDetails($slug)
    {
        return view('frontend.blog_details')->with('post', Post::where('slug', $slug)->firstOrFail());
    }
}
