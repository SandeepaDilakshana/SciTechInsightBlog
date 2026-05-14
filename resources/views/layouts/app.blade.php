<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title', 'Blog App') </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />



    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- add toastr link after the tailwind links and @vite  --}}

</head>

<body class="font-sans antialiased text-gray-900 bg-gray-100">

    <div class="flex min-h-screen">

        <input type="checkbox" id="sidebar-toggle" class="hidden peer" />

        <aside
            class="fixed inset-y-0 left-0 z-50 w-64 overflow-y-auto text-white transition-transform duration-300 ease-in-out transform -translate-x-full shadow-2xl bg-slate-900 peer-checked:translate-x-0 lg:static lg:inset-0 lg:translate-x-0">

            <div class="sticky top-0 z-10 flex items-center justify-between h-20 px-6 bg-slate-800 lg:bg-slate-900">
                <span class="text-2xl font-bold tracking-wider text-blue-400">BLOG APP</span>
                <label for="sidebar-toggle" class="cursor-pointer lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </label>
            </div>

            <nav class="mt-6">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-6 py-4 hover:bg-slate-800 transition {{ request()->routeIs('dashboard') ? 'bg-blue-600 border-r-4' : '' }}">
                            <span class="mr-3"></span> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories') }}"
                            class="flex items-center px-6 py-4 hover:bg-slate-800 transition {{ request()->routeIs('categories') ? 'bg-blue-600 border-r-4' : '' }}">
                            <span class="mr-3"></span> All Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('posts') }}"
                            class="flex items-center px-6 py-4 hover:bg-slate-800 transition {{ request()->routeIs('posts') ? 'bg-blue-600 border-r-4' : '' }}">
                            <span class="mr-3"></span> All Posts
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tags') }}"
                            class="flex items-center px-6 py-4 hover:bg-slate-800 transition {{ request()->routeIs('tags') ? 'bg-blue-600 border-r-4' : '' }}">
                            <span class="mr-3"></span> All Tags
                        </a>
                    </li>
                    @role('admin')
                        <li>
                            <a href="{{ route('users') }}"
                                class="flex items-center px-6 py-4 hover:bg-slate-800 transition {{ request()->routeIs('users') ? 'bg-blue-600 border-r-4' : '' }}">
                                <span class="mr-3"></span> Users
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.create') }}"
                                class="flex items-center px-6 py-4 hover:bg-slate-800 transition {{ request()->routeIs('user.create') ? 'bg-blue-600 border-r-4' : '' }}">
                                <span class="mr-3"></span> Create New User
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings') }}"
                                class="flex items-center px-6 py-4 hover:bg-slate-800 transition {{ request()->routeIs('settings') ? 'bg-blue-600 border-r-4' : '' }}">
                                <span class="mr-3"></span> Settings
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('env_view') }}"
                                class="flex items-center px-6 py-4 hover:bg-slate-800 transition {{ request()->routeIs('env_view') ? 'bg-blue-600 border-r-4' : '' }}">
                                <span class="mr-3"></span> Update env
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('messages') }}"
                                class="flex items-center px-6 py-4 hover:bg-slate-800 transition {{ request()->routeIs('messages') ? 'bg-blue-600 border-r-4' : '' }}">
                                <span class="mr-3"></span> Messages
                            </a>
                        </li>
                    @endrole
                    <li>
                        <a href="{{ route('post.create') }}"
                            class="flex items-center px-6 py-4 hover:bg-slate-800 transition {{ request()->routeIs('post.create') ? 'bg-blue-600 border-r-4' : '' }}">
                            <span class="mr-3"></span> Add New Post
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <label for="sidebar-toggle" class="fixed inset-0 z-30 hidden bg-black/50 peer-checked:block lg:hidden"></label>

        <div class="flex flex-col flex-1 min-w-0">

            <header
                class="sticky top-0 z-40 flex items-center justify-between h-16 px-4 bg-white border-b shadow-sm sm:px-6">
                <div class="flex items-center">
                    <label for="sidebar-toggle"
                        class="p-2 mr-2 text-gray-600 transition rounded-md cursor-pointer lg:hidden hover:bg-gray-100 hover:text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>

                    @isset($header)
                        <h1 class="text-lg font-bold text-gray-800 truncate sm:text-xl">{{ $header }}</h1>
                    @endisset
                </div>

                <div>
                    @include('layouts.navigation')
                </div>
            </header>

            <main class="flex-1 p-6 overflow-y-auto md:p-10">
                <div class="max-w-6xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
    };

    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

</html>
