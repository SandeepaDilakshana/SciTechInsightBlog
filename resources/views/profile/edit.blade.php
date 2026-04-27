{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.app')

@section('title')
    Edit Profile
@endsection

@section('content')
    @include('includes.errors')

    <div class="mt-5 overflow-hidden bg-white border border-gray-200 shadow sm:rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-700">Edit your profile</h3>
        </div>

        <div class="p-6">
            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6" id="profileForm">
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
                <div class="flex flex-col space-y-1">
                    <label for="password" class="text-sm font-semibold text-gray-600">New Password</label>
                    <input type="password" name="password"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your new here" required>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="avatar" class="text-sm font-semibold text-gray-600">Upload new avatar</label>
                    <input type="file" name="avatar"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your photo here" required>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="facebook" class="text-sm font-semibold text-gray-600">Facebook</label>
                    <input type="text" name="facebook"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Facebook profile" required>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="youtube" class="text-sm font-semibold text-gray-600">Youtube</label>
                    <input type="text" name="youtube"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Youtube channel" required>
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="about" class="text-sm font-semibold text-gray-600">About</label>
                    <div id="editor" style="height: 300px;" class="bg-white"></div>
                    <input type="hidden" name="about" id="content-hidden">
                </div>

                <div class="pt-4 text-center">
                    <button type="submit"
                        class="w-full md:w-auto px-10 py-2.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow-md transition duration-200 transform hover:-translate-y-0.5">
                        Edit Profile
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write about you...'
        });


        const form = document.querySelector('#profileForm');
        form.onsubmit = function() {
            const contentInput = document.querySelector('#content-hidden');

            contentInput.value = quill.root.innerHTML;
        };
    </script>
@endsection
