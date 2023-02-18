<?php

namespace Modules\Product\Listeners;

use Illuminate\Support\Facades\Mail;
use Modules\Product\Events\SendReOrderEmailEvent;

class SendReorderEMailListener
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
     * @param  SendReOrderEmailEvent  $event
     * @return void
     */
    public function handle(SendReOrderEmailEvent $event){
        Mail::send('product::emails.reorderEvent', [], function($message) {
            $message->from(env('REORDER_EMAIL'));
            $message->to(env('REORDER_EMAIL'));
            $message->subject('Medexsepeti ReOrder Products');
        });
    }
}
