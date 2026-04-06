@extends('layouts.app')

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
@endsection
