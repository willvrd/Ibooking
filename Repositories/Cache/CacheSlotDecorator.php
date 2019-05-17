<?php

namespace Modules\Ibooking\Repositories\Cache;

use Modules\Ibooking\Repositories\SlotRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSlotDecorator extends BaseCacheDecorator implements SlotRepository
{
    public function __construct(SlotRepository $slot)
    {
        parent::__construct();
        $this->entityName = 'ibooking.slots';
        $this->repository = $slot;
    }
}
