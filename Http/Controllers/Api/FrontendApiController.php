<?php

namespace Modules\Ibooking\Http\Controllers\Api;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Ibooking\Transformers\ReservationTransformer;
use Modules\Ibooking\Transformers\DayTransformer;
use Modules\Ibooking\Transformers\SlotTransformer;

// Entities
use Modules\Ibooking\Entities\Reservation;
use Modules\Ibooking\Entities\Day;
use Modules\Ibooking\Entities\Slot;

// Repositories
use Modules\Ibooking\Repositories\ReservationRepository;
use Modules\Ibooking\Repositories\DayRepository;
use Modules\Ibooking\Repositories\SlotRepository;

//Support
use Illuminate\Support\Facades\Auth;

class FrontendApiController extends BaseApiController
{

  private $reservation;
  private $day;
  private $slot;
  
  public function __construct(
    ReservationRepository $reservation,
    DayRepository $day,
    SlotRepository $slot
    )
  {
    $this->reservation = $reservation;
    $this->day = $day;
    $this->slot = $slot;
  }

  /**
   * Find Reservations with Days and Slots
   * @return Response
   */
  public function findRDS(Request $request)
  {
    try {

      $params = $this->getParamsRequest($request);

      if(isset($params->filter)){
          $filter = $params->filter;
          $date = $filter->date;

          // Get Reservations for this date
          $filterReservation =array(
            "startDate" => $date
          );
          $reservations = $this->reservation->getItemsBy((object)[
            'take' => false,
            'filter' => json_decode(json_encode($filterReservation))
          ]);

        
          // Get Days for a date Enabled
          $filterDay =array(
            "status" => 1,
            "dayDate" => $date
          );
          $include = array('slots','events');

          $days = $this->day->getItemsBy((object)[
            'take' => false,
            'include' => $include,
            'filter' => json_decode(json_encode($filterDay))
          ]);

          // Day is inactive or not exist
          if(count($days)<=0){
            
            $dayNumber = date('N',strtotime($date));

            // Filter by day number
            $filterDay =array(
              "status" => 1,
              "dayNum" => $dayNumber
            );
            $include = array('slots','events');
          
            $days = $this->day->getItemsBy((object)[
              'take' => 1,
              'include' => $include,
              'filter' => json_decode(json_encode($filterDay))
            ]);

          }// and IF days

          foreach($days as $day){
            $slots = $day->slots;
            break;
          }

          dd($slots);
         

      

          

      }// End if isset
    
    

     


     
     

      //Request to Repository
      //$slots = $this->slot->getItemsBy($this->getParamsRequest($request));

      //Response
      //$response = ['data' => SlotTransformer::collection($slots)];
      
      //If request pagination add meta-page
      //$request->page ? $response['meta'] = ['page' => $this->pageTransformer($slots)] : false;

    } catch (\Exception $e) {
      
      \Log::error($e);
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];

    }
    return response()->json($response, $status ?? 200);
  }

  

  

 


 

}
