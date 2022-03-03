<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailEventListener
{
    protected $mailData;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(SendMail $sendMail)
    {
        $this->sendMail = $sendMail;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
         $event->listen(
            \App\Events\SendMail::class, '\App\Listeners\SendMailEventListener'
        );
    }
}
