<?php

namespace Modules\Ibooking\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ibooking\Entities\Reservation;
use Modules\Ibooking\Http\Requests\CreateReservationRequest;
use Modules\Ibooking\Http\Requests\UpdateReservationRequest;
use Modules\Ibooking\Repositories\ReservationRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

use Modules\Ibooking\Repositories\SlotRepository;
use Modules\Ibooking\Repositories\PlanRepository;

use Modules\Ibooking\Entities\DaysWeek;
use Modules\Ibooking\Entities\ReservationStatus;

class ReservationController extends AdminBaseController
{
    /**
     * @var ReservationRepository
     */
    private $reservation;
    private $daysWeek;
    private $slot;
    private $reservationStatus;
    private $plan;
    private $coupon;

    public function __construct(
        ReservationRepository $reservation,
        DaysWeek $daysWeek,
        SlotRepository $slot,
        ReservationStatus $reservationStatus,
        PlanRepository $plan
    )
    {
        parent::__construct();

        $this->reservation = $reservation;
        $this->daysWeek = $daysWeek;
        $this->slot= $slot;
        $this->reservationStatus = $reservationStatus;
        $this->plan = $plan;
        $this->coupon = app('Modules\Ishoppingcart\Repositories\CouponRepository');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reservations = $this->reservation->all();
        return view('ibooking::admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $daysWeek = $this->daysWeek;
        $slots = $this->slot->all();
        $status = $this->reservationStatus;
        $plans = $this->plan->all();
        $coupons = $this->coupon->all();
        return view('ibooking::admin.reservations.create',compact('daysWeek','slots','status','plans','coupons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateReservationRequest $request
     * @return Response
     */
    public function store(CreateReservationRequest $request)
    {
        $this->reservation->create($request->all());

        return redirect()->route('admin.ibooking.reservation.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ibooking::reservations.title.reservations')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Reservation $reservation
     * @return Response
     */
    public function edit(Reservation $reservation)
    {
        return view('ibooking::admin.reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Reservation $reservation
     * @param  UpdateReservationRequest $request
     * @return Response
     */
    public function update(Reservation $reservation, UpdateReservationRequest $request)
    {
        $this->reservation->update($reservation, $request->all());

        return redirect()->route('admin.ibooking.reservation.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ibooking::reservations.title.reservations')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Reservation $reservation
     * @return Response
     */
    public function destroy(Reservation $reservation)
    {
        $this->reservation->destroy($reservation);

        return redirect()->route('admin.ibooking.reservation.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ibooking::reservations.title.reservations')]));
    }
}
