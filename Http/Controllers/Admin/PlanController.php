<?php

namespace Modules\Ibooking\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ibooking\Entities\Plan;
use Modules\Ibooking\Http\Requests\CreatePlanRequest;
use Modules\Ibooking\Http\Requests\UpdatePlanRequest;
use Modules\Ibooking\Repositories\PlanRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PlanController extends AdminBaseController
{
    /**
     * @var PlanRepository
     */
    private $plan;

    public function __construct(PlanRepository $plan)
    {
        parent::__construct();

        $this->plan = $plan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$plans = $this->plan->all();

        return view('ibooking::admin.plans.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ibooking::admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePlanRequest $request
     * @return Response
     */
    public function store(CreatePlanRequest $request)
    {
        $this->plan->create($request->all());

        return redirect()->route('admin.ibooking.plan.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ibooking::plans.title.plans')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Plan $plan
     * @return Response
     */
    public function edit(Plan $plan)
    {
        return view('ibooking::admin.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Plan $plan
     * @param  UpdatePlanRequest $request
     * @return Response
     */
    public function update(Plan $plan, UpdatePlanRequest $request)
    {
        $this->plan->update($plan, $request->all());

        return redirect()->route('admin.ibooking.plan.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ibooking::plans.title.plans')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Plan $plan
     * @return Response
     */
    public function destroy(Plan $plan)
    {
        $this->plan->destroy($plan);

        return redirect()->route('admin.ibooking.plan.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ibooking::plans.title.plans')]));
    }
}
