@extends('layouts.app')

@section('title')
    Edit post
@endsection

@section('content')
    @include('includes.errors')

    <div class="mt-5 overflow-hidden bg-white border border-gray-200 shadow sm:rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-700">Edit your post: {{ $post->title }}</h3>
        </div>

        <div class="p-6">
            <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6" id="postForm">
                @csrf

                <div class="flex flex-col space-y-1">
                    <label for="title" class="text-sm font-semibold text-gray-600">Title</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}"
                        class="px-4 py-2 transition border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter post title" required>
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="category" class="text-sm font-semibold text-gray-600">Select Category</label>
                    <select name="category_id" id="category"
                        class="px-4 py-2 transition bg-white border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="" disabled selected>Choose a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags" class="mb-2 text-sm font-semibold text-gray-600">Select tags</label>
                    @foreach ($tags as $tag)
                        <div class="flex items-center mb-4">
                            <input type="checkbox" id="basic" value="{{ $tag->id }}" name="tags[]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded accent-blue-600"
                                @foreach ($post->tags as $t)
                                    @if ($tag->id == $t->id)
                                        checked
                                    @endif @endforeach>
                            <label for="basic" class="ml-2 text-sm font-medium text-gray-900">{{ $tag->tag }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="featured" class="text-sm font-semibold text-gray-600">Existing Image</label>

                    @if ($post->featured)
                        <div class="mb-2">
                            <img src="{{ asset($post->featured) }}" alt="current image"
                                class="object-cover w-32 h-20 rounded-md">
                        </div>
                    @endif

                    <input type="file" name="featured" id="featured"
                        class="px-2 py-1 transition border border-gray-300 rounded-md file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>


                <div class="flex flex-col space-y-1">
                    <label for="content" class="text-sm font-semibold text-gray-600">Content</label>

                    <div id="editor" style="height: 300px;" class="bg-white">{!! $post->content !!}</div>

                    <input type="hidden" name="content" id="content-hidden" </div>

                    <div class="pt-4 text-center">
                        <button type="submit"
                            class="w-full md:w-auto px-10 py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow-md transition duration-200 transform hover:-translate-y-0.5">
                            Update Post
                        </button>
                    </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write your content here...'
        });


        const form = document.querySelector('#postForm');
        form.onsubmit = function() {
            const contentInput = document.querySelector('#content-hidden');

            contentInput.value = quill.root.innerHTML;
        };
    </script>
@endsection
