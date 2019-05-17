<?php

namespace Modules\Ibooking\Repositories\Cache;

use Modules\Ibooking\Repositories\PriceRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePriceDecorator extends BaseCacheDecorator implements PriceRepository
{
    public function __construct(PriceRepository $price)
    {
        parent::__construct();
        $this->entityName = 'ibooking.prices';
        $this->repository = $price;
    }
}
