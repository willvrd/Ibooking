<?php

namespace Modules\Ibooking\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


use Modules\Ibooking\Events\EventWasCreated;
use Modules\Ibooking\Events\EventWasUpdated;
use Modules\Ibooking\Events\EventWasDeleted;

use Modules\Ibooking\Events\PlanWasCreated;
use Modules\Ibooking\Events\PlanWasUpdated;
use Modules\Ibooking\Events\PlanWasDeleted;
use Modules\Ibooking\Events\Handlers\PlanSavePrices;
use Modules\Ibooking\Events\Handlers\PlanUpdatePrices;
use Modules\Ibooking\Events\Handlers\PlanDeletePrices;

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
        PlanWasCreated::class => [
            PlanSavePrices::class,
        ],
        PlanWasUpdated::class => [
            PlanUpdatePrices::class,
        ],
        PlanWasDeleted::class => [
            PlanDeletePrices::class,
        ],
    ];
}
