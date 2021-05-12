<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\PostCreated;
use App\Mail\NewPost;
use Illuminate\Support\Facades\Mail;

class NewPostCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to(array($event->post->email, $event->post->user->email, 'cris@gar.cia'))
                ->send(new NewPost($event->post->title));
    }
}