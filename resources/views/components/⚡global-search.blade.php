<?php

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

new class extends Component
{
    public $query = '';

    public function with(): array
    {
        $posts = [];
        $categories = [];
        $tags = [];
        $totalResults = 0;

        if (!empty($this->query)) {
            $posts = Post::search($this->query)->take(5)->get();
            $categories = Category::search($this->query)->take(5)->get();
            $tags = Tag::search($this->query)->take(5)->get();

            $totalResults = $posts->count() + $categories->count() + $tags->count();
        }

        return [
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
            'totalResults' => $totalResults,
        ];
    }
};
?>

<div class="position-relative w-100" style="max-width: 300px;">
    <div class="app-search d-flex align-items-center position-relative">
        <input type="text" wire:model.live="query" class="form-control" placeholder="Search...">
        <span class="bx bx-search-alt position-absolute" style="right: 15px; z-index: 10; pointer-events: none;"></span>
    </div>

    @if(!empty($query))
        <div class="mt-2 shadow-lg card position-absolute" style="z-index: 9999; width: 100%; max-height: 350px; overflow-y: auto; left: 0;">
            <div class="p-3 card-body">
                <p class="mb-2 text-muted small fw-bold text-uppercase" style="font-size: 11px;">
                    Found {{ $totalResults }} Results
                </p>
                <hr class="my-1 opacity-25">

                @if(count($posts) > 0)
                    <h6 class="mt-2 mb-1 text-primary fw-bold" style="font-size: 13px;"><i class='bx bx-news me-1'></i> Posts</h6>
                    <div class="mb-2 list-group list-group-flush">
                        @foreach($posts as $post)
                            <a href="{{ route('posts', $post->id) }}" class="py-1 border-0 list-group-item list-group-item-action small text-secondary ps-1">
                                • {{ Str::limit($post->title, 35) }}
                            </a>
                        @endforeach
                    </div>
                @endif

                @if(count($categories) > 0)
                    <h6 class="mt-2 mb-1 text-success fw-bold" style="font-size: 13px;"><i class='bx bx-folder me-1'></i> Categories</h6>
                    <div class="mb-2 list-group list-group-flush">
                        @foreach($categories as $category)
                            <a href="{{ route('categories', $category->id) }}" class="py-1 border-0 list-group-item list-group-item-action small text-secondary ps-1">
                                # {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                @endif

                @if(count($tags) > 0)
                    <h6 class="mt-2 mb-1 text-warning fw-bold" style="font-size: 13px;"><i class='bx bx-tag me-1'></i> Tags</h6>
                    <div class="flex-wrap gap-1 p-1 d-flex">
                        @foreach($tags as $tag)
                            <a href="{{ route('tags', $tag->id) }}" class="px-2 py-0 btn btn-sm btn-outline-secondary rounded-pill" style="font-size: 11px;">
                                {{ $tag->tag }}
                            </a>
                        @endforeach
                    </div>
                @endif

                @if($totalResults == 0)
                    <p class="p-1 mb-0 text-danger small" style="font-size: 12px;">
                        <i class='bx bx-info-circle me-1'></i>No results found.
                    </p>
                @endif
            </div>
        </div>
    @endif
</div>
