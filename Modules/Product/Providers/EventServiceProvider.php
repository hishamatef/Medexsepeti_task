<?php

namespace Modules\Product\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Product\Events\SendReOrderEmailEvent;
use Modules\Product\Listeners\SendReorderEMailListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SendReOrderEmailEvent::class => [
            SendReorderEMailListener::class,
        ],
    ];
}
