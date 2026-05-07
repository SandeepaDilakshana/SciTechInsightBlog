@extends('frontend.layouts.master')

@section('title', $title)

@section('content')
    <div class="page-heading header-text">
        <div class="container">
            <h1>{{ $title }}</h1>
            <span>Showing all articles under {{ $title }}</span>
        </div>
    </div>

    <div class="single-services">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <section class='tabs-content'>
                        @forelse ($posts as $post)
                            <article style="margin-bottom: 50px; border-bottom: 1px solid #eee; padding-bottom: 30px;">
                                <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}"
                                     style="width: 100%; height: 400px; object-fit: cover; border-radius: 5px;">
                                <h4 style="margin-top: 20px;">
                                    <a href="{{ route('blog.details', $post->slug) }}">{{ $post->title }}</a>
                                </h4>
                                <p>{!! Str::limit($post->content, 200) !!}</p>
                                <div style="margin-top: 15px;">
                                    <a href="{{ route('blog.details', $post->slug) }}" class="filled-button">Continue Reading</a>
                                </div>
                            </article>
                        @empty
                            <div class="alert alert-warning">No posts found for this selection.</div>
                        @endforelse

                        <div class="pagination" style="display: flex; justify-content: flex-end;">
                            {{ $posts->links() }}
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
