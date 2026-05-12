{{-- @extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="mt-5 overflow-hidden bg-white border border-gray-200 shadow-sm sm:rounded-lg">
        <div class="p-8 text-center text-white bg-gradient-to-r from-blue-600 to-indigo-700">
            <h2 class="text-4xl font-extrabold tracking-tight">
                Dashboard
            </h2>
            <p class="mt-2 text-lg text-blue-100 opacity-90">
                Welcome back to your control center!
            </p>
        </div>

        <div class="p-10 text-center">
            <div class="inline-flex items-center justify-center">
            </div>
            <h3 class="text-2xl font-semibold text-gray-800">Hello, User!</h3>
        </div>
    </div>
@endsection --}}

@extends('layouts.app') {{-- ඔයාගේ layout එක main.blade.php නිසා --}}

@section('title')
    Dashboard
@endsection

@section('content')
<div class="space-y-8">
    <div class="relative overflow-hidden bg-white border border-gray-200 shadow-sm rounded-2xl sm:rounded-3xl">
        <div class="p-8 text-white md:p-12 bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-800">
            <div class="relative z-10">
                <h2 class="text-3xl font-extrabold tracking-tight md:text-5xl">
                    Dashboard
                </h2>
                <p class="max-w-2xl mt-3 text-lg text-blue-100 opacity-90 md:text-xl">
                    Hello, <span class="font-semibold text-white">{{ Auth::user()->name }}</span>! Welcome back to your blog's control center.
                </p>
            </div>
            <div class="absolute top-0 right-0 p-4 -mt-20 -mr-20 opacity-20">
                <div class="rounded-full w-72 h-72 bg-blue-400/30 blur-3xl"></div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div class="flex items-center p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md">
            <div class="p-4 mr-4 text-blue-600 bg-blue-100 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase">Total Posts</p>
                <h4 class="text-2xl font-bold text-gray-800">{{ $posts_count ?? '0' }}</h4>
            </div>
        </div>

        <div class="flex items-center p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md">
            <div class="p-4 mr-4 text-purple-600 bg-purple-100 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-grid"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase">Categories</p>
                <h4 class="text-2xl font-bold text-gray-800">{{ $categories_count ?? '0' }}</h4>
            </div>
        </div>

        <div class="flex items-center p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md">
            <div class="p-4 mr-4 text-orange-600 bg-orange-100 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag"><path d="M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z"/><path d="M7 7h.01"/></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase">Tags</p>
                <h4 class="text-2xl font-bold text-gray-800">{{ $tags_count ?? '0' }}</h4>
            </div>
        </div>

        <div class="flex items-center p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md">
            <div class="p-4 mr-4 text-green-600 bg-green-100 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase">Users</p>
                <h4 class="text-2xl font-bold text-gray-800">{{ $users_count ?? '0' }}</h4>
            </div>
        </div>
    </div>

    <div class="p-8 bg-white border border-gray-100 shadow-sm rounded-2xl">
        <h3 class="mb-6 text-xl font-bold text-gray-800">Quick Actions</h3>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('post.create') }}" class="inline-flex items-center px-5 py-3 text-sm font-medium text-white transition bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Create New Post
            </a>
            <a href="{{ route('settings') }}" class="inline-flex items-center px-5 py-3 text-sm font-medium text-gray-700 transition bg-gray-100 rounded-lg hover:bg-gray-200">
                Update Settings
            </a>
        </div>
    </div>
</div>
@endsection
