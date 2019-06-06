<?php

namespace Modules\Ibooking\Http\Controllers\Api;

// Requests & Response
use Modules\Ibooking\Http\Requests\CreateDayRequest;
use Modules\Ibooking\Http\Requests\UpdateDayRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Ibooking\Transformers\DayTransformer;

// Entities
use Modules\Ibooking\Entities\Day;

// Repositories
use Modules\Ibooking\Repositories\DayRepository;

//Support
use Illuminate\Support\Facades\Auth;

class DayApiController extends BaseApiController
{

  private $day;
  
  public function __construct(
    DayRepository $day
    )
  {
    $this->day = $day;
    
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index(Request $request)
  {
    try {
      //Request to Repository
      $days = $this->day->getItemsBy($this->getParamsRequest($request));

      //Response
      $response = ['data' => DayTransformer::collection($days)];
      
      //If request pagination add meta-page
      $request->page ? $response['meta'] = ['page' => $this->pageTransformer($days)] : false;

    } catch (\Exception $e) {
      
      \Log::error($e);
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];

    }
    return response()->json($response, $status ?? 200);
  }

  /** SHOW
   * @param Request $request
   *  URL GET:
   *  &fields = type string
   *  &include = type string
   */
  public function show($criteria, Request $request)
  {
    try {
      //Request to Repository
      $day = $this->day->getItem($criteria,$this->getParamsRequest($request));

      //Break if no found item
      if (!$day) throw new \Exception('Item not found', 204);

      $response = [
        'data' => $day ? new DayTransformer($day) : '',
      ];

    } catch (\Exception $e) {
      \Log::error($e);
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

  /**
   * Show the form for creating a new resource.
   * @return Response
   */
  public function create(Request $request)
  {

    \DB::beginTransaction();

    try{

      //Get data
      $data = $request['attributes'] ?? [];

      //Validate Request
      $this->validateRequestApi(new CreateDayRequest($data));

      //Create
      $day = $this->day->create($data);

      //Response
      $response = ["data" => new DayTransformer($day)];

      \DB::commit(); //Commit to Data Base

    } catch (\Exception $e) {

        \Log::error($e);
        \DB::rollback();//Rollback to Data Base
        $status = $this->getStatusError($e->getCode());
        $response = ["errors" => $e->getMessage()];
    }

    return response()->json($response, $status ?? 200);

  }

  /**
   * Update the specified resource in storage.
   * @param  Request $request
   * @return Response
   */
  public function update($criteria, Request $request)
  {
    try {

      \DB::beginTransaction();

      //Get data
      $data = $request['attributes'] ?? [];

      //Validate Request
      $this->validateRequestApi(new UpdateDayRequest($data));

      $params = $this->getParamsRequest($request);

      $day = $this->day->updateBy($criteria,$data,$params);

      $response = ['data' => new DayTransformer($day)];

      \DB::commit(); //Commit to Data Base

    } catch (\Exception $e) {

      \Log::error($e);
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
      
    }

    return response()->json($response, $status ?? 200);

  }


  /**
   * Remove the specified resource from storage.
   * @return Response
   */
  public function delete($criteria, Request $request)
  {
    try {

      //Get params
      $params = $this->getParamsRequest($request);

      $this->day->deleteBy($criteria,$params);

      $response = ['data' => 'Item deleted'];

    } catch (\Exception $e) {

      \Log::Error($e);
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }

    return response()->json($response, $status ?? 200);
    
  }

}
