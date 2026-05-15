<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

            $postStats = Post::select(
                DB::raw('count(id) as data'),
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month')
            )
            ->where('created_at', '>', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        } else {
            $posts_count = Post::where('user_id', $user->id)->count();
            $categories_count = Category::count();
            $tags_count = Tag::count();
            $users_count = User::count();

            $posts = Post::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

            $postStats = Post::select(
                DB::raw('count(id) as data'),
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month')
            )
            ->where('user_id', $user->id)
            ->where('created_at', '>', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        }

        $chartLabels = $postStats->pluck('month')->toArray();
        $chartData = $postStats->pluck('data')->toArray();

        return view('admin_panel.layouts.master', compact(
            'posts_count',
            'categories_count',
            'tags_count',
            'users_count',
            'posts',
            'chartData',
            'chartLabels'
        ));
    }
}
