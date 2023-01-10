<?php

namespace App\Observers;

use App\Models\Tag;

class TagObserver
{
    public function creating(Tag $tag)
    {
        info('creating', [time()]);
    }
    public function created(Tag $tag)
    {
        info('created', [time()]);
    }

    /**
     * Handle the Tag "updated" event.
     *
     * @param  \App\Models\Tag  $tag
     * @return void
     */
    public function updated(Tag $tag)
    {
        //
    }

    /**
     * Handle the Tag "deleted" event.
     *
     * @param  \App\Models\Tag  $tag
     * @return void
     */
    public function deleted(Tag $tag)
    {
        //
    }

    /**
     * Handle the Tag "restored" event.
     *
     * @param  \App\Models\Tag  $tag
     * @return void
     */
    public function restored(Tag $tag)
    {
    }

    public function forceDeleted(Tag $tag)
    {
    }
}
