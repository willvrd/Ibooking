<?php

namespace Modules\Ibooking\Repositories\Cache;

use Modules\Ibooking\Repositories\PlanRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePlanDecorator extends BaseCacheDecorator implements PlanRepository
{
    public function __construct(PlanRepository $plan)
    {
        parent::__construct();
        $this->entityName = 'ibooking.plans';
        $this->repository = $plan;
    }
}
