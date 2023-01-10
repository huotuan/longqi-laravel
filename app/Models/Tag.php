<?php

namespace App\Models;

use App\Events\TagCreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use function Illuminate\Events\queueable;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $guarded = [];

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function videos(): MorphToMany
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
