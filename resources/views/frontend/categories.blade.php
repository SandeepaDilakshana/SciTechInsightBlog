@extends('frontend.layouts.master')

@section('title', 'All Categories')

@section('content')
<div class="page-heading header-text">
    <div class="container">
        <h1>Explore Categories</h1>
        <span>Browse posts by your favorite topics</span>
    </div>
</div>

<div class="services">
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4" style="margin-bottom: 30px;">
                <div class="service-item" style="padding: 30px; background: #fff; border: 1px solid #eee; text-align: center; border-radius: 10px; transition: 0.3s;">
                    <i class="fa fa-folder-open" style="font-size: 40px; color: #a4c639; margin-bottom: 15px;"></i>
                    <h4>{{ $category->name }}</h4>
                    <p>{{ $category->posts_count }} Articles available</p>
                    <a href="#" class="filled-button" style="margin-top: 15px;">View Posts</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
