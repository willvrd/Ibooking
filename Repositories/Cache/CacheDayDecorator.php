<?php

namespace Modules\Ibooking\Repositories\Cache;

use Modules\Ibooking\Repositories\DayRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDayDecorator extends BaseCacheDecorator implements DayRepository
{
    public function __construct(DayRepository $day)
    {
        parent::__construct();
        $this->entityName = 'ibooking.days';
        $this->repository = $day;
    }
}
