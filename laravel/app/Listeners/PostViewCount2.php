<?php

namespace App\Listeners;

use App\Events\PostViewEvent2;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostViewCount2 implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $post;
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostViewEvent2  $event
     * @return void
     */
    public function handle(PostViewEvent2 $event)
    {
        $this->post=$event->post;
        $this->post->count+=1;
        $this->post->save();
    }
}
