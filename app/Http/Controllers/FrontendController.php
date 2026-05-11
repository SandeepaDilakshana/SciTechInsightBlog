<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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

        $posts = $query->paginate(3);

        return view('frontend.blog')->with('posts', $posts);
    }

    public function blogDetails($slug)
    {
        $post = Post::with(['user', 'category', 'tags'])->where('slug', $slug)->firstOrFail();

        return view('frontend.blog_details')->with('post', $post);
    }

    public function allCategories()
    {
        $categories = Category::withCount('posts')->get();

        return view('frontend.categories', compact('categories'));
    }

    public function allTags()
    {
        $tags = Tag::withCount('posts')->get();

        return view('frontend.tags', compact('tags'));
    }

    public function categoryPosts($id)
    {
        $category = Category::findOrFail($id);
        $posts = Post::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate(3);
        $title = 'Category: '.$category->name;

        return view('frontend.post_list', compact('posts', 'title'));
    }

    public function tagPosts($id)
    {
        $tag = Tag::findOrFail($id);
        $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(3);
        $title = 'Tag: #'.$tag->tag;

        return view('frontend.post_list', compact('posts', 'title'));
    }

    public function handleContact(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
            'cf-turnstile-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => env('TURNSTILE_SECRET_KEY'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ]);

        $outcome = $response->json();

        if (! $outcome['success']) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['captcha' => 'Captcha Verification Failed. Please try again.']);
        }

        $contactData = [
            'name' => $validData['name'],
            'email' => $validData['email'],
            'message' => $validData['message'],
        ];

        Contact::create($contactData);
        Mail::to('sandeepadilakshana@gmail.com')->send(new ContactMail($contactData));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');

    }
}
