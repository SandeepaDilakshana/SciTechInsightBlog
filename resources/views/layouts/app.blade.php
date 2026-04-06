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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
<header class="bg-white shadow dark:bg-gray-800">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{ $header }}
        </div>
        </header>
    @endisset

    <!-- Page Content -->
    <div class="container px-4 mx-auto">
        <div class="flex">
            <!-- Sidebar -->
            <div class="w-1/3 pr-4">
                <ul class="space-y-2">

                    <li class="p-2">
                        <a href="{{ route('dashboard') }}" class="block">
                            Home
                        </a>
                    </li>

                    <li class="p-2">
                        <a href="{{ route('categories') }}" class="block">
                            Categories
                        </a>
                    </li>

                    <li class="p-2">
                        <a href="{{ route('category.create') }}" class="block">
                            Create new Category
                        </a>
                    </li>

                    <li class="p-2">
                        <a href="{{ route('post.create') }}" class="block">
                            Create new post
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Content Section -->
            <div class="w-2/3">
                @yield('content')
            </div>
        </div>
    </div>

</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>

</html>
