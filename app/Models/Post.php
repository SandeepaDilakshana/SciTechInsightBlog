<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id',
        'title',
        'content',
        'category_id',
        'featured',

    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
