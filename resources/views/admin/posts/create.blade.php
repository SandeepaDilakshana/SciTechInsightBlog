@extends('layouts.app')

@section('title')
    Create new post
@endsection

@section('content')
    @if (count($errors) > 0)
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif

    <div class="mt-5 overflow-hidden bg-white border border-gray-200 shadow sm:rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-700">Create a new post</h3>
        </div>

        <div class="p-6">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="flex flex-col space-y-1">
                    <label for="title" class="text-sm font-semibold text-gray-600">Title</label>
                    <input type="text" name="title" id="title"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter post title" required>
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="category" class="text-sm font-semibold text-gray-600">Select Category</label>
                    <select name="category_id" id="category"
                        class="px-4 py-2 transition bg-white border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="" disabled selected>Choose a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="featured" class="text-sm font-semibold text-gray-600">Featured Image</label>
                    <input type="file" name="featured" id="featured"
                        class="px-2 py-1 transition border border-gray-300 rounded-md file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="content" class="text-sm font-semibold text-gray-600">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Write your content here..."></textarea>
                </div>

                <div class="pt-4 text-center">
                    <button type="submit"
                        class="w-full md:w-auto px-10 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-md transition duration-200 transform hover:-translate-y-0.5">
                        Store Post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
