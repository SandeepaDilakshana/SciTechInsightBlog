<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->admin) {
            $posts_count = Post::count();
            $categories_count = Category::count();
            $tags_count = Tag::count();
            $users_count = User::count();

            $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        } else {
            $posts_count = Post::where('user_id', $user->id)->count();
            $categories_count = Category::count();
            $tags_count = Tag::count();
            $users_count = User::count();

            $posts = Post::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
        }

        return view('dashboard', compact(
            'posts_count',
            'categories_count',
            'tags_count',
            'users_count',
            'posts'
        ));
    }
}
