<?php

namespace Modules\Ibooking\Presenters;

use Laracasts\Presenter\Presenter;
use Modules\Ibooking\Entities\Reservation;

class ReservationPresenter extends Presenter
{
  
    protected $status;
   
    public function __construct($entity){

        parent::__construct($entity);
        $this->status = app('Modules\Ibooking\Entities\ReservationStatus');
    }

    public function status(){
        return $this->status->get($this->entity->status);
    }

    


}
