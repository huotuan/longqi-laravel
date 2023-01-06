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

    protected $dispatchesEvents = [
        'created' => TagCreatedEvent::class,
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            info('boot event', [time()]);
        });
        static::updated(function ($model) {
            info('boot updated event', [time()]);
        });
    }

    public static function booted()
    {
        parent::booted();
        static::created(queueable(function ($model) {
            info('booted event', [time()]);
        }));
    }

    public static function booting()
    {
        parent::booting();
        static::created(function ($model) {
            info('booting event', [time()]);
        });
    }

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function videos(): MorphToMany
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
