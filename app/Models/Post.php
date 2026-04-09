<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
