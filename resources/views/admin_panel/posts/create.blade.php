@extends('admin_panel.layouts.master')

@section('title')
    Create Post
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 card-title">
                        <h4 class="card-title">Create a New Post</h4>
                    </div>

                    @include('admin_panel.includes.errors')

                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" id="postForm">
                        @csrf

                        <div class="mb-4 row">
                            <label for="title" class="col-sm-3 col-form-label">Post Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Enter post title" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="category" class="col-sm-3 col-form-label">Select Category</label>
                            <div class="col-sm-9">
                                <select name="category_id" id="category" class="form-select" required>
                                    <option value="" disabled selected>Choose a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label class="col-sm-3 col-form-label">Select Tags</label>
                            <div class="col-sm-9">
                                <div class="flex-wrap gap-3 pt-2 d-flex">
                                    @foreach ($tags as $tag)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tags[]"
                                                value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                                            <label class="form-check-label" for="tag-{{ $tag->id }}">
                                                {{ $tag->tag }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="featured" class="col-sm-3 col-form-label">Featured Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="featured" class="form-control" id="featured" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label class="col-sm-3 col-form-label">Content</label>
                            <div class="col-sm-9">
                                <div id="editor" style="height: 300px; background: #fff;"></div>
                                <input type="hidden" name="content" id="content-hidden">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">
                                        <i class="bx bx-save me-1"></i> Store Post
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write your post content here...'
        });

        const form = document.querySelector('#postForm');
        form.onsubmit = function() {
            const contentInput = document.querySelector('#content-hidden');
            contentInput.value = quill.root.innerHTML;
        };
    </script>
@endsection
