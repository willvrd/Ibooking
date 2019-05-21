<?php

namespace Modules\Ibooking\Repositories\Eloquent;

use Modules\Ibooking\Repositories\PlanRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentPlanRepository extends EloquentBaseRepository implements PlanRepository
{

    public function create($data)
    {
       
        dd($data);
        /*
            listPrices => [
                {"price":1,"people":"12"},
                {"price":2,"people":"20"}
            ]
        */
        if(isset($data["listPrices"])){
            $listPrices = json_decode($data["listPrices"]);
            foreach($listPrices as $infor){
                echo $infor->price."<br>";
            }
        }

        dd("fin");

        $plan = $this->model->create($data);
       

        

        return $plan;
    }


}
