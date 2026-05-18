<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use Searchable;

    protected $fillable = ['tag'];

    public function posts(): BelongsToMany
    {
        return $this-> belongsToMany(Post::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'tag' => $this->tag
        ];
    }
}
