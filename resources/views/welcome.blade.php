<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        
    @endif
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="flex flex-col items-center px-6 py-16 mx-auto max-w-7xl">

        <div class="max-w-3xl text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 md:text-6xl">
                Write your thoughts. <br>
                <span class="text-indigo-600">Inspire the world.</span>
            </h1>
            <p class="mt-6 text-lg leading-relaxed text-gray-600">
                Join a community of writers and readers. Start your own blog today or explore stories from creators
                around the globe. Simple, fast, and elegant.
            </p>

            <div class="flex flex-col justify-center gap-4 mt-10 sm:flex-row">
                <a href="{{ route('register') }}"
                    class="px-8 py-4 font-semibold text-white transition duration-300 bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700">
                    Get Started
                </a>
            </div>

            <div class="flex justify-center gap-8 pt-8 mt-12 border-t border-gray-200">
                <div>
                    <span class="block text-2xl font-bold text-gray-900">10k+</span>
                    <span class="text-sm text-gray-500">Writers</span>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-gray-900">50k+</span>
                    <span class="text-sm text-gray-500">Articles</span>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-gray-900">1M+</span>
                    <span class="text-sm text-gray-500">Readers</span>
                </div>
            </div>
        </div>

    </div>
</div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
