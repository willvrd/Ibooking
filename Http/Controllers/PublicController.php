<?php

namespace Modules\Ibooking\Http\Controllers;

// Modules
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Setting\Contracts\Setting;

// Ibooking
use Modules\Ibooking\Repositories\EventRepository;
use Modules\Ibooking\Repositories\ReservationRepository;

// Ishoppingcart
use Modules\Ishoppingcart\Repositories\CouponRepository;

class PublicController extends BasePublicController
{
    /**
     * @var Repository
     */

    private $event;
    private $reservation;
    private $eventSlot;
    private $coupon; 
    private $setting;
   

    public function __construct(
        EventRepository $event, 
        ReservationRepository $reservation, 
        CouponRepository $coupon, 
        Setting $setting
    )
    {
        parent::__construct();
        $this->event = $event;
        $this->reservation = $reservation;
        $this->coupon = $coupon;
        $this->setting=$setting;
        
    }


     /**
     * View Index
     *
     * @return Response
     */
    public function index()
    {

        $tpl = 'ibooking::frontend.index';
        $ttpl='ibooking.index';

        if(view()->exists($ttpl)) $tpl = $ttpl;

        $events = $this->event->all();

        return view($tpl, compact('events'));

    }

    /**
     * View Show
     *
     * @return Response
     */
    public function show($slug)
    {

        $tpl = 'ibooking::frontend.show';
        $ttpl='ibooking.show';

        if(view()->exists($ttpl)) $tpl = $ttpl;

        $event = $this->event->findBySlug($slug);

        //clearReservation();

        return view($tpl, compact('event'));


    }

    /**
     * View Giftcard
     *
     * @return Response
     */

    public function giftcard($eventslug){

        $tpl = 'ibooking::frontend.giftcard.index';
        $ttpl='ibooking.giftcard.index';

        if(view()->exists($ttpl)) $tpl = $ttpl;

        $event = $this->event->findBySlug($eventslug);

        return view($tpl, compact('event'));

    }

   

}