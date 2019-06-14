<?php

namespace Modules\Ibooking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

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

    /**
     * Ajax Request
     *
     * @return Response
     */
    public function findSlots(Request $request){

        dd($request);


    }

    /**
     * Create Reservation
     *
     * @return Response
     */
    public function reservationCreate(Request $request){
        
        dd("Crear reservacion");
        /*
        $newReservation = new Reservation;
        $newReservation->fullname = $request->input('buyer_name');
        $newReservation->email = $request->input('buyer_email');
        $newReservation->phone = $request->input('buyer_phone');
        $newReservation->description = $request->input('descriptionall');
        $newReservation->event_slot_id = $request->input('buyer_eventSlotID');
        $newReservation->date = $request->input('buyer_date');
        $newReservation->cantPer = $request->input('buyer_cantPer');
        $newReservation->mode = $request->input('mode');

        // Revisa si el Precio que selecciono corresponde al Modo y a la cantidad de Personas
        $entitie = "\Modules\Ibooking\Entities\Mode";
        $resultCheck = $this->checkPriceModeUser($request->input('buyer_eventID'),$request->input('mode'),$entitie,$request->input('buyer_value'),$request->input('buyer_cantPer'));

        if($resultCheck)
            $newReservation->value = $request->input('buyer_value');
        else
            return redirect()->back();
        
        // Proceso del Cupon
        if(!empty($request->input('coupon_code'))){

           $dateNow = date("Y-m-d");
           $coupon = $this->coupon->findByCode($request->input('coupon_code'),$dateNow);

           if(count($coupon)==0){
                // Cupon ya no esta disponible (Paso las fechas)
              return redirect()->back();
            
           }else{
                if(($coupon->cant>0)){

                    $newReservation->coupon_id = $coupon->id;
                    $entitie = "\Modules\Ibooking\Entities\Mode";

                    // Revisa si el Precio que selecciono corresponde al Modo y a la cantidad de Personas
                    $resultCheck = $this->checkPriceModeUser($request->input('buyer_eventID'),$request->input('mode'),$entitie,$request->input('buyer_value'),$request->input('buyer_cantPer'));

                    if($resultCheck)
                        $price = $request->input('buyer_value');
                    else
                        return redirect()->back();
                   
                    // Verifica el tipo de cupon
                    if($coupon->type=="p"){
                        $discount = ($price * $coupon->value) / 100;
                    }else{
                        $discount = $coupon->value;
                    }


                    $amount = (float)$price - (float)$discount;
                    
                    // Cancela completo
                    if($amount<=0){

                        $newReservation->value = $request->input('buyer_value');
                        $newReservation->status = 1;
                       
                        $newReservation->save();

                        $coupon->cant = $coupon->cant - 1;
                        $coupon->save();

                        $this->sendEmail($newReservation,$coupon);

                        return redirect()->route("homepage");
                    }else{
                        // Queda un saldo a cancelar
                        $newReservation->value = $amount;
                        $newReservation->status = 2;
                        
                        $newReservation->save();

                        $coupon->cant = $coupon->cant - 1;
                        $coupon->save();

                        $request->session()->put('reservationID', $newReservation->id);
                        return redirect()->route(locale().'.checkout');
                    }
                    
                }else{
                    // Ya no se puede cambiar mas
                     return redirect()->back();
                }
           }
          
        }

        $newReservation->status = 2;
        $newReservation->save();

        $request->session()->put('reservationID', $newReservation->id);

        return redirect()->route(locale().'.checkout');

        */
    }

   

}