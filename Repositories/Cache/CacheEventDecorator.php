<?php

namespace Modules\Ibooking\Repositories\Cache;

use Modules\Ibooking\Repositories\EventRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheEventDecorator extends BaseCacheDecorator implements EventRepository
{
    public function __construct(EventRepository $event)
    {
        parent::__construct();
        $this->entityName = 'ibooking.events';
        $this->repository = $event;
    }
}
