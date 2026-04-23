@extends('layouts.app')

@section('title')
    Create new user
@endsection

@section('content')
    @include('includes.errors')

    <div class="mt-5 overflow-hidden bg-white border border-gray-200 shadow sm:rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-700">Create a new user</h3>
        </div>

        <div class="p-6">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6"
                id="postForm">
                @csrf

                <div class="flex flex-col space-y-1">
                    <label for="name" class="text-sm font-semibold text-gray-600">Name</label>
                    <input type="text" name="name"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your name here" required>
                </div>
                
                <div class="flex flex-col space-y-1">
                    <label for="email" class="text-sm font-semibold text-gray-600">Email</label>
                    <input type="email" name="email"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your email here" required>
                </div>

                <div class="pt-4 text-center">
                    <button type="submit"
                        class="w-full md:w-auto px-10 py-2.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow-md transition duration-200 transform hover:-translate-y-0.5">
                        Add User
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
