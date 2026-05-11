@extends('frontend.layouts.master')

@section('title', 'All Tags')

@section('content')
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Explore by Tags</h1>
                <span>Discover content through our diverse range of topics and keywords.</span>
            </div>
        </div>
    </div>
</div>

<div class="more-info about-info" style="padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center col-md-10">
                <div class="section-heading">
                    <h2>Our <em>Tag Cloud</em></h2>
                    <p>Click on a tag to see all related blog posts.</p>
                </div>

                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px; margin-top: 30px;">
                    @forelse($tags as $tag)
                        <a href="{{ route('tag.posts', ['id' => $tag->id]) }}"
                           style="
                                display: inline-block;
                                background: #ffffff;
                                color: #1e1e1e;
                                padding: 12px 25px;
                                border-radius: 50px;
                                font-size: 15px;
                                font-weight: 500;
                                text-decoration: none;
                                border: 1px solid #ddd;
                                transition: all 0.3s ease;
                                box-shadow: 0 4px 6px rgba(0,0,0,0.05);
                           "
                           onmouseover="this.style.background='#a4c639'; this.style.color='#fff'; this.style.borderColor='#a4c639'; this.style.transform='translateY(-3px)';"
                           onmouseout="this.style.background='#ffffff'; this.style.color='#1e1e1e'; this.style.borderColor='#ddd'; this.style.transform='translateY(0)';"
                        >
                            <i class="fa fa-tag" style="font-size: 12px; margin-right: 5px;"></i>
                            {{ $tag->tag }}
                            <span style="font-size: 11px; opacity: 0.7; margin-left: 5px;">({{ $tag->posts_count ?? '0' }})</span>
                        </a>
                    @empty
                        <div class="alert alert-info">No tags found at the moment.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
