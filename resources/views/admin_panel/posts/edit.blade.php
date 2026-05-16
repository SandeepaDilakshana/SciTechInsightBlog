@extends('admin_panel.layouts.master')

@section('title')
    Edit Post
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 d-flex align-items-center justify-content-between">
                        <div class="mb-0 card-title">
                            <h4>Edit Post: {{ $post->title }}</h4>
                        </div>
                        <a href="{{ route('posts') }}" class="btn btn-sm btn-secondary">
                            <i class="bx bx-arrow-back"></i> Back to Posts
                        </a>
                    </div>

                    @include('includes.errors')

                    <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST"
                        enctype="multipart/form-data" id="postForm">
                        @csrf

                        <div class="mb-4 row">
                            <label for="title" class="col-sm-3 col-form-label">Post Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ $post->title }}" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="category" class="col-sm-3 col-form-label">Select Category</label>
                            <div class="col-sm-9">
                                <select name="category_id" id="category" class="form-select" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
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
                                                value="{{ $tag->id }}" id="tag-{{ $tag->id }}"
                                                @foreach ($post->tags as $t)
                                                @if ($tag->id == $t->id) checked @endif @endforeach>
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
                                @if ($post->featured)
                                    <div class="mb-3">
                                        <label class="d-block text-muted small">Current Image:</label>
                                        <img src="{{ asset($post->featured) }}" alt="current image"
                                            class="border rounded shadow-sm"
                                            style="width: 120px; height: 80px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="featured" class="form-control" id="featured">
                                <small class="text-xs italic text-muted">Leave blank if you don't want to change the
                                    image.</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label class="text-white col-sm-3 col-form-label">Content</label>
                            <div class="col-sm-9">
                                <div id="editor" style="height: 300px; border: 1px solid #ced4da;">
                                    {!! $post->content !!}</div>
                                <input type="hidden" name="content" id="content-hidden">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">
                                        <i class="bx bx-refresh me-1"></i> Update Post
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
            placeholder: 'Update your post content here...'
        });

        const form = document.querySelector('#postForm');
        form.onsubmit = function() {
            const contentInput = document.querySelector('#content-hidden');
            contentInput.value = quill.root.innerHTML;
        };
    </script>

    <style>
        #editor .ql-editor {
            color: white !important;
            background-color: transparent !important;
        }

        #editor .ql-editor.ql-blank::before {
            color: rgba(255, 255, 255, 0.6) !important;
        }

        .ql-snow .ql-stroke {
            stroke: white !important;
        }

        .ql-snow .ql-fill {
            fill: white !important;
        }

        .ql-snow .ql-picker {
            color: white !important;
        }
    </style>
@endsection
