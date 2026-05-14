@extends('frontend.layouts.master')

@section('title', 'Blog Details')

@section('content')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $post->title }}</h1>
                    <span><i class="fa fa-user"></i> {{ $post->user->name }}
                        &nbsp;|&nbsp;{{ $post->category->name }}&nbsp;|&nbsp;<i class="fa fa-calendar"></i>
                        {{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="more-info about-info">
        <div class="container">
            <div class="more-info-content">
                <div class="right-content">
                    <div>
                        <img src="{{ asset($post->featured) }}" class="img-fluid" alt="{{ $post->title }}" loading="lazy"
                            style="width:
                            100%; height: 500px; object-fit: cover; border-radius: 5px;">
                    </div>
                    <div style="margin-top:20px;">
                        <span><i class="fa fa-user"></i> {{ $post->user->name }}
                            &nbsp;|&nbsp;{{ $post->category->name }}&nbsp;|&nbsp;<i class="fa fa-calendar"></i>
                            {{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <br>
                    <div class="post-description">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px dashed #eee; text-align: center;">
        <h5 style="font-size: 16px; margin-bottom: 15px; color: #333;">
            <i class="fa fa-tags"></i> Tags
        </h5>

        <div class="tags" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 8px;">
            @forelse($post->tags as $tag)
                <a href="#"
                    style="
                display: inline-block;
                background: #f8f9fa;
                color: #555;
                padding: 6px 18px;
                border-radius: 50px;
                font-size: 13px;
                text-decoration: none;
                transition: all 0.3s ease;
                border: 1px solid #e0e0e0;
                font-weight: 500;
                box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                    {{ $tag->tag }}
                </a>
            @empty
                <span style="color: #999; font-style: italic;">No tags for this post.</span>
            @endforelse
        </div>
    </div>
    <br>
    <br>

    <div style="margin-top: 40px; padding: 30px; background-color: #f9f9f9; border-radius: 10px; border: 1px solid #eee;">
        <div class="row align-items-center">
            <div class="text-center col-md-3">
                <img src="{{ $post->user->profile ? asset($post->user->profile->avatar) : asset('assets/images/default-avatar.png') }}"
                    alt="{{ $post->user->name }}" loading="lazy"
                    style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            </div>

            <div class="text-center col-md-9 text-md-left">
                <h5 style="color: #1e1e1e; font-weight: 700; margin-bottom: 5px;">
                    <span
                        style="font-weight: 400; font-size: 14px; color: #a1a1a1; display: block; text-transform: uppercase; letter-spacing: 1px;">Written
                        By</span>
                    {{ $post->user->name }}
                </h5>
                <p style="color: #666; font-size: 14px; line-height: 1.6; margin-bottom: 0;">
                    {!! $post->user->profile->about ?? 'Expert contributor and passionate storyteller sharing insights with our community.' !!}
                </p>
            </div>
        </div>
    </div>
@endsection
