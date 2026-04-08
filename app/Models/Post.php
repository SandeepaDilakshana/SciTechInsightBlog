<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
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
