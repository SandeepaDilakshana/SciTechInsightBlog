@extends('layouts.app')

@section('title')
    Edit blog settings
@endsection

@section('content')
    @include('includes.errors')

    <div class="mt-5 overflow-hidden bg-white border border-gray-200 shadow sm:rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-700">Edit blog settings</h3>
        </div>

        <div class="p-6">
            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6"
                id="postForm">
                @csrf

                <div class="flex flex-col space-y-1">
                    <label for="site_name" class="text-sm font-semibold text-gray-600">Site name</label>
                    <input type="text" name="site_name" value="{{ $settings->site_name }}"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your Site name here" required>
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="address" class="text-sm font-semibold text-gray-600">Address</label>
                    <input type="text" name="address" value="{{ $settings->address }}"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your address here" required>
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="contact_number" class="text-sm font-semibold text-gray-600">Contact Number</label>
                    <input type="text" name="contact_number" value="{{ $settings->contact_number }}"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your contact number here" required>
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="contact_email" class="text-sm font-semibold text-gray-600">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ $settings->contact_email }}"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your contact email here" required>
                </div>

                <div class="pt-4 text-center">
                    <button type="submit"
                        class="w-full md:w-auto px-10 py-2.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow-md transition duration-200 transform hover:-translate-y-0.5">
                        Update Site Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
