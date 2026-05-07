<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'featured',

    ];

    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post){
            $post->slug = Str::slug($post->title);
        });
    }

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this-> belongsToMany(Tag::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
