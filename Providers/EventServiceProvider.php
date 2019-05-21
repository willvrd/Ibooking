<?php

namespace Modules\Ibooking\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

//use Modules\Ibooking\Events\Handlers\SaveEventImage;
use Modules\Ibooking\Events\EventWasCreated;
use Modules\Ibooking\Events\EventWasUpdated;
use Modules\Ibooking\Events\EventWasDeleted;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        EventWasCreated::class => [
            //SaveEventImage::class,
        ],
        EventWasUpdated::class => [
            //SaveEventImage::class,
        ],
        EventWasDeleted::class => [
            //SaveEventImage::class,
        ],
    ];
}
