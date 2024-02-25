<?php

namespace App\Observers;

use App\Jobs\MailNewsBlog;
use App\Models\Blog;
use Illuminate\Support\Facades\Queue;

class BlogsSubscribe
{
    /**
     * Handle the Blog "created" event.
     */
    public function created(Blog $blog): void
    {
        $delay = now()->addMinutes(10);

      //  Queue::later($delay, dispatch(new MailNewsBlog($blog)));
         MailNewsBlog::dispatch($blog)->delay($delay);

    }

    /**
     * Handle the Blog "updated" event.
     */
    public function updated(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "deleted" event.
     */
    public function deleted(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "restored" event.
     */
    public function restored(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "force deleted" event.
     */
    public function forceDeleted(Blog $blog): void
    {
        //
    }
}
