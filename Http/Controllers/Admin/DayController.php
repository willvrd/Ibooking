<?php

namespace Modules\Ibooking\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ibooking\Entities\Day;
use Modules\Ibooking\Http\Requests\CreateDayRequest;
use Modules\Ibooking\Http\Requests\UpdateDayRequest;
use Modules\Ibooking\Repositories\DayRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DayController extends AdminBaseController
{
    /**
     * @var DayRepository
     */
    private $day;

    public function __construct(DayRepository $day)
    {
        parent::__construct();

        $this->day = $day;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$days = $this->day->all();

        return view('ibooking::admin.days.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ibooking::admin.days.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDayRequest $request
     * @return Response
     */
    public function store(CreateDayRequest $request)
    {
        $this->day->create($request->all());

        return redirect()->route('admin.ibooking.day.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ibooking::days.title.days')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Day $day
     * @return Response
     */
    public function edit(Day $day)
    {
        return view('ibooking::admin.days.edit', compact('day'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Day $day
     * @param  UpdateDayRequest $request
     * @return Response
     */
    public function update(Day $day, UpdateDayRequest $request)
    {
        $this->day->update($day, $request->all());

        return redirect()->route('admin.ibooking.day.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ibooking::days.title.days')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Day $day
     * @return Response
     */
    public function destroy(Day $day)
    {
        $this->day->destroy($day);

        return redirect()->route('admin.ibooking.day.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ibooking::days.title.days')]));
    }
}
