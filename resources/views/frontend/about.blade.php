@extends('frontend.layouts.master')

@section('title', 'About Us')

@section('content')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>About Us</h1>
                    <span>A dedicated platform for insightful thoughts and expert perspectives.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="more-info about-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="more-info-content">
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <div class="right-content">
                                    <span>Leading the way in digital storytelling</span>
                                    <h2>Get to know about us</h2>
                                    <p>Founded with a vision to simplify complex ideas, Blog Application has become a
                                        trusted source for expert analysis and the latest industry trends. We pride
                                        ourselves on our integrity and our dedication to providing accurate, well-researched
                                        information to our global audience.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="left-image">
                                    <img src="{{ asset('frontend/assets/images/about-1-570x350.jpg') }}" alt="about" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-content">
                        <span>Our Impact in Numbers</span>
                        <h2>Making a difference through every word we write.</h2>
                        <p>We take pride in our commitment to quality content and community growth. Over the years, we have
                            built a space where knowledge is shared freely and stories come to life.
                            <br><br>Our statistics reflect the dedication of our writers and the trust of our global readers
                            who join us on this journey every day.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">{{ $postCount }}</div>
                                <div class="count-title">Articles</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">{{ $userCount }}</div>
                                <div class="count-title">Users</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">{{ $tagCount }}</div>
                                <div class="count-title">Tags</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">{{ $categoryCount }}</div>
                                <div class="count-title">Categories</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
