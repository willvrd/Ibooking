<?php

namespace Modules\Ibooking\Repositories\Cache;

use Modules\Ibooking\Repositories\ReservationRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheReservationDecorator extends BaseCacheDecorator implements ReservationRepository
{
    public function __construct(ReservationRepository $reservation)
    {
        parent::__construct();
        $this->entityName = 'ibooking.reservations';
        $this->repository = $reservation;
    }
}
