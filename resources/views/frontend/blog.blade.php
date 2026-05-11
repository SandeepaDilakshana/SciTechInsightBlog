@extends('frontend.layouts.master')

@section('title', 'Blog')

@section('content')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Read our Blog</h1>
                    <span>Explore stories, tips, and insights from our creative community.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="single-services">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <section class='tabs-content'>
                        @foreach ($posts as $post)
                            <article style="margin-bottom: 50px; border-bottom: 1px solid #eee; padding-bottom: 30px;">
                                <img src="{{ $post->featured }}" alt="{{ $post->title }}" loading="lazy"
                                    style="width: 100%; height: 400px; object-fit: cover; border-radius: 5px;">
                                <h4 style="margin-top: 20px;">
                                    <a href="{{ route('blog.details', $post->slug) }}">{{ $post->title }}</a>
                                </h4>
                                <div style="margin-bottom:10px;">
                                    <span>
                                        <i
                                            class="fa fa-user"></i>&nbsp;&nbsp;{{ $post->user->name ?? 'Admin' }}&nbsp;|&nbsp;
                                        <i
                                            class="fa fa-list"></i>&nbsp;{{ $post->category->name ?? 'Uncategorized' }}&nbsp;|&nbsp;
                                        <i class="fa fa-calendar"></i>&nbsp;{{ $post->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <p>{!! Str::limit($post->content, 200) !!}</p>
                                <div style="margin-top: 15px;">
                                    <a href="{{ route('blog.details', $post->slug) }}" class="filled-button">Continue
                                        Reading</a>
                                </div>
                            </article>
                        @endforeach

                        <div class="pagination"
                            style="margin-top: 20px; margin-bottom:20px; display: flex; justify-content: flex-end;">
                            {{ $posts->appends(['q' => request('q')])->links() }}
                        </div>
                    </section>
                </div>

                <div class="col-md-4">
                    <h4 class="h4">Search</h4>

                    <form id="search_form" name="gs" method="GET" action="{{ route('blog.show') }}">
                        <input type="text" name="q" class="form-control form-control-lg"
                            placeholder="type to search..." autocomplete="on" value="{{ request()->get('q') }}">
                    </form>

                    <br>
                    <br>

                    <h4 class="h4">Recent posts</h4>

                    <ul>
                        @foreach ($posts->take(3) as $recent)
                            <li style="margin-bottom: 20px; list-style: none;">
                                <h5 style="margin-bottom:5px;">
                                    <a href="{{ route('blog.details', $recent->slug) }}"
                                        style="color: #1e1e1e; text-decoration: none; font-weight: 600;">
                                        {{ $recent->title }}
                                    </a>
                                </h5>
                                <small style="color: #a1a1a1;">
                                    <i class="fa fa-list"></i> {{ $recent->category->name ?? 'General' }} &nbsp;|&nbsp;
                                    <i class="fa fa-calendar"></i> {{ $recent->created_at->diffForHumans() }}
                                </small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
