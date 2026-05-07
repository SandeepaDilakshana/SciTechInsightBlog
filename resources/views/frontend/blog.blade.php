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
                        <article id='tabs-1'>
                            <img src="{{ $first_post->featured }}" alt="{{ $first_post->title }}">
                            <h4><a href="{{ route('blog.details', $first_post->slug) }}">{{ $first_post->title }}"</a></h4>
                            <div style="margin-bottom:10px;">
                                <span><i
                                        class="fa fa-user"></i>&nbsp;&nbsp;{{ $first_post->user->name }}&nbsp;|&nbsp;{{ $first_post->category->name }}
                                    &nbsp;|&nbsp;
                                    {{ $first_post->created_at->diffForHumans() }} &nbsp;&nbsp;</span>
                            </div>
                            <p>{!! Str::limit($first_post->content, 200) !!}</p>
                            <br>
                            <div>
                                <a href="{{ route('blog.details', $first_post->slug) }}" class="filled-button">Continue
                                    Reading</a>
                            </div>
                        </article>

                        <br>
                        <br>
                        <br>

                        <article id='tabs-2'>
                            <img src="{{ $second_post->featured }}" alt="{{ $second_post->title }}">
                            <h4><a href="{{ route('blog.details', $second_post->slug) }}">{{ $second_post->title }}"</a>
                            </h4>
                            <div style="margin-bottom:10px;">
                                <span><i
                                        class="fa fa-user"></i>&nbsp;&nbsp;{{ $second_post->user->name }}&nbsp;|&nbsp;{{ $second_post->category->name }}
                                    &nbsp;|&nbsp;
                                    {{ $second_post->created_at->diffForHumans() }} &nbsp;&nbsp;</span>
                            </div>
                            <p>{!! Str::limit($second_post->content, 200) !!}</p>
                            <br>
                            <div>
                                <a href="{{ route('blog.details', $second_post->slug) }}" class="filled-button">Continue
                                    Reading</a>
                            </div>
                        </article>
                    </section>
                </div>

                <div class="col-md-4">
                    <h4 class="h4">Search</h4>

                    <form id="search_form" name="gs" method="GET" action="#">
                        <input type="text" name="q" class="form-control form-control-lg"
                            placeholder="type to search..." autocomplete="on">
                    </form>

                    <br>
                    <br>

                    <h4 class="h4">Recent posts</h4>

                    <ul>
                        <li>
                            <h5 style="margin-bottom:10px;"><a
                                    href="{{ route('blog.details', $first_post->slug) }}">{{ $first_post->title }}</a>
                            </h5>
                            <small>{{ $first_post->category->name }} &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                {{ $first_post->created_at->diffForHumans() }}</small>
                        </li>

                        <li><br></li>

                        <li>
                            <h5 style="margin-bottom:10px;"><a
                                    href="{{ route('blog.details', $second_post->slug) }}">{{ $second_post->title }}</a>
                            </h5>
                            <small>{{ $second_post->category->name }} &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                {{ $second_post->created_at->diffForHumans() }}</small>
                        </li>

                        <li><br></li>

                        <li>
                            <h5 style="margin-bottom:10px;"><a
                                    href="{{ route('blog.details', $third_post->slug) }}">{{ $third_post->title }}</a>
                            </h5>

                            <small>{{ $third_post->category->name }} &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                {{ $third_post->created_at->diffForHumans() }}</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
@endsection
