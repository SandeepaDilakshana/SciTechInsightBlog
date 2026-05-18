<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use SoftDeletes, Searchable;

    protected $fillable = [
        'name'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name
        ];
    }
}
