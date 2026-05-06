@extends('frontend.layouts.master')

@section('title', 'Home')

@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
            <!-- Item -->
            <div class="item item-1">
                <div class="img-fill">
                    <div class="text-content">
                        <h4>{{ $first_post->title }}</h4>
                        <p>{!! $first_post->content !!}</p>
                        <a href="blog.html" class="filled-button">Read More</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item item-2">
                <div class="img-fill">
                    <div class="text-content">
                        <h4>{{ $second_post->title }}</h4>
                        <p>{!! $second_post->content !!}</p>
                        <a href="blog.html" class="filled-button">Read More</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item item-3">
                <div class="img-fill">
                    <div class="text-content">
                        <h4>{{ $third_post->title }}</h4>
                        <p>{!! $third_post->content !!}</p>
                        <a href="blog.html" class="filled-button">Read More</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="more-info">
        <div class="container">
            <div class="row" id="tabs">
                <div class="col-md-4">
                    <ul>
                        <li><a href='#tabs-1'>{{ $first_post->title }}<br> <small>{{ $first_post->category->name }}
                                    &nbsp;|&nbsp;
                                    {{ $first_post->created_at->diffForHumans() }}</small></a></li>
                        <li><a href='#tabs-2'>{{ $second_post->title }}<br> <small>{{ $second_post->category->name }}
                                    &nbsp;|&nbsp;
                                    {{ $second_post->created_at->diffForHumans() }}</small></a></li>
                        <li><a href='#tabs-3'>{{ $third_post->title }}<br> <small>{{ $third_post->category->name }}
                                    &nbsp;|&nbsp; {{ $third_post->created_at->diffForHumans() }}</small></a></li>
                    </ul>

                    <br>

                    <div class="text-center">
                        <a href="blog.html" class="filled-button">Read More</a>
                    </div>

                    <br>
                </div>

                <div class="col-md-8">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src="{{ $first_post->featured }}" alt="{{ $first_post->title }}">
                            <h4><a href="blog-details.html">{{ $first_post->title }}</a></h4>
                            <p>{!! $first_post->content !!}</p>
                        </article>
                        <article id='tabs-2'>
                            <img src="{{ $second_post->featured }}" alt="{{ $second_post->title }}">
                            <h4><a href="blog-details.html">{{ $second_post->title }}</a></h4>
                            <p>{!! $second_post->content !!}</p>
                        </article>
                        <article id='tabs-3'>
                            <img src="{{ $third_post->featured }}" alt="{{ $third_post->title }}">
                            <h4><a href="blog-details.html">{{ $third_post->title }}</a></h4>
                            <p>{!! $third_post->content !!}
                            </p>
                        </article>
                    </section>
                </div>
            </div>


        </div>
    </div>

    <div class="fun-facts">
        <div class="container">
            <div class="more-info-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="left-image">
                            <img src="{{ asset('frontend/assets/images/about-1-570x350.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="right-content">
                            <span>Who we are</span>
                            <h2>Get to know <em>about us</em></h2>
                            <p>Curabitur pulvinar sem a leo tempus facilisis. Sed non sagittis neque. Nulla conse quat
                                tellus nibh, id molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus</p>
                            <a href="{{ route('about.show') }}" class="filled-button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
