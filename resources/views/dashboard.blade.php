@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="space-y-8 duration-500 animate-in fade-in">
    <div class="relative overflow-hidden bg-white border border-gray-200 shadow-sm rounded-2xl sm:rounded-3xl">
        <div class="p-8 text-white md:p-12 bg-gradient-to-r from-indigo-600 via-blue-700 to-cyan-600">
            <div class="relative z-10">
                <div class="flex items-center space-x-4">
                    @if(Auth::user()->profile)
                        <img src="{{ asset(Auth::user()->profile->avatar) }}" class="w-16 h-16 border-2 border-white rounded-full shadow-lg">
                    @endif
                    <div>
                        <h2 class="text-3xl font-extrabold tracking-tight md:text-5xl">
                            Dashboard
                        </h2>
                        <p class="mt-2 text-lg text-blue-100 opacity-90">
                            Welcome back, <span class="font-semibold text-white">{{ Auth::user()->name }}</span>! Here's what's happening today.
                        </p>
                    </div>
                </div>
            </div>
            <div class="absolute top-0 right-0 p-4 -mt-16 -mr-16 opacity-20">
                <div class="w-64 h-64 rounded-full bg-white/30 blur-3xl"></div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div class="p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-2xl hover:shadow-md group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold tracking-wider text-gray-500 uppercase">Total Posts</p>
                    <h4 class="mt-1 text-3xl font-black text-gray-800">{{ $posts_count ?? '0' }}</h4>
                </div>
                <div class="p-3 text-blue-600 transition-colors bg-blue-50 rounded-xl group-hover:bg-blue-600 group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                </div>
            </div>
        </div>

        <div class="p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-2xl hover:shadow-md group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold tracking-wider text-gray-500 uppercase">Categories</p>
                    <h4 class="mt-1 text-3xl font-black text-gray-800">{{ $categories_count ?? '0' }}</h4>
                </div>
                <div class="p-3 text-purple-600 transition-colors bg-purple-50 rounded-xl group-hover:bg-purple-600 group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                </div>
            </div>
        </div>

        <div class="p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-2xl hover:shadow-md group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold tracking-wider text-gray-500 uppercase">Tags</p>
                    <h4 class="mt-1 text-3xl font-black text-gray-800">{{ $tags_count ?? '0' }}</h4>
                </div>
                <div class="p-3 text-orange-600 transition-colors bg-orange-50 rounded-xl group-hover:bg-orange-600 group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z"/><path d="M7 7h.01"/></svg>
                </div>
            </div>
        </div>

        <div class="p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-2xl hover:shadow-md group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold tracking-wider text-gray-500 uppercase">Users</p>
                    <h4 class="mt-1 text-3xl font-black text-gray-800">{{ $users_count ?? '0' }}</h4>
                </div>
                <div class="p-3 text-green-600 transition-colors bg-green-50 rounded-xl group-hover:bg-green-600 group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div class="p-8 bg-white border border-gray-100 shadow-sm lg:col-span-1 rounded-2xl">
            <h3 class="flex items-center mb-6 text-xl font-bold text-gray-800">
                <span class="w-2 h-6 mr-3 bg-blue-600 rounded-full"></span>
                Quick Actions
            </h3>
            <div class="grid grid-cols-1 gap-4">
                <a href="{{ route('post.create') }}" class="flex items-center justify-center w-full px-5 py-4 font-bold text-white transition duration-300 bg-blue-600 shadow-lg rounded-xl hover:bg-blue-700 hover:-translate-y-1 shadow-blue-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    New Article
                </a>
                <a href="{{ route('settings') }}" class="flex items-center justify-center w-full px-5 py-4 font-bold text-gray-700 transition duration-300 bg-gray-100 rounded-xl hover:bg-gray-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Settings
                </a>
            </div>
        </div>

        <div class="overflow-hidden bg-white border border-gray-100 shadow-sm lg:col-span-2 rounded-2xl">
            <div class="flex items-center justify-between p-6 border-b border-gray-50">
                <h3 class="text-xl font-bold text-gray-800">Your Recent Posts</h3>
                <a href="{{ route('posts') }}" class="text-sm font-semibold text-blue-600 hover:underline">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-xs font-bold tracking-wider text-gray-500 uppercase">Post</th>
                            <th class="px-6 py-3 text-xs font-bold tracking-wider text-center text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($posts->take(5) as $post)
                        <tr class="transition hover:bg-gray-50/50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="{{ asset($post->featured) }}" class="object-cover w-10 h-10 mr-3 rounded-lg">
                                    <span class="font-medium text-gray-700 truncate max-w-[200px]">{{ $post->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 text-xs font-bold text-green-700 bg-green-100 rounded-full">Published</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-6 py-8 text-center text-gray-400">No recent posts found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
