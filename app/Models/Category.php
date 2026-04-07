<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    public function posts()
    {
        return $this->hasMany('App\Model\Post');
    }
}
