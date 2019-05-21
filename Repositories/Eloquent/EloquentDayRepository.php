<?php

namespace Modules\Ibooking\Repositories\Eloquent;

use Modules\Ibooking\Repositories\DayRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentDayRepository extends EloquentBaseRepository implements DayRepository
{

    public function create($data){

        //dd($data["date"]);
        $dayNumber = date('N',$data["date"]);
        dd($dayNumber);
         


        $day = $this->model->create($data);
        return $day;
       

    }

    public function update($day, $data)
    {

        $day->update($data);

        return $day;

    }


}
