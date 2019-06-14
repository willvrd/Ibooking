<div class="row booking-process-form">

    <div class="col-xs-12">
      <div class="back pull-right">
        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
        {{trans('ibooking::frontend.button.back')}}
      </div>
    </div>
    
    <div class="col-xs-12">
      <div class="form-information">

        @php $form_id = uniqid("form_"); @endphp


         <form id="{{$form_id}}" class="form-horizontal"  method="post" action="{{route('ibooking.reservation.create')}}">

         <div class="content-form">
            <input type="hidden" name="form_id" value="{{$form_id}}" required="">
            {{csrf_field()}}

            <div class="infor col-xs-12">
              <label class="pull-left"> {{trans('ibooking::frontend.form.event')}}: </label>
              <div class="text">

                <div class="eventName pull-left">{{$event->title}} ( </div>
                <div class="dateSelect pull-left"></div>
                <div class="hourSelect pull-left"></div>

                <input type="hidden" name="buyer_date" id="buyer_date" value="" >
                <input type="hidden" name="buyer_eventSlotID" id="buyer_eventSlotID" value="" >
        
              </div>

              <input type="hidden" name="descriptionall" id="descriptionall" value="" >
            </div>
            
            <div class="infor col-xs-12">
              <label class="pull-left">{{trans('ibooking::frontend.form.place')}}: </label>
              <div class="text"> {{$event->place}}</div>
            </div>

            <div class="infor col-xs-12">
              <label class="pull-left">{{trans('ibooking::frontend.form.tickets')}}: </label>
              <div class="text">{{$participantes}}</div>
            </div>

            <div class="infor col-xs-12">
              <div class="total pull-right">{{$precio}}€</div>
              <label class="pull-right">{{trans('ibooking::frontend.form.total')}}:</label>
              <input type="hidden" name="buyer_value" id="buyer_value" value="{{$precio}}" >
            </div>

            <div class="col-xs-12">
              @include('ibooking::frontend.booking.coupon')
            </div>

            <div class="col-xs-12">
              <h4 class="title-infor-buyer">{{trans('ibooking::frontend.buyer')}}</h4>
            </div>

            <div class="col-xs-12 form-field">
                <label for="buyer_name">{{trans('ibooking::frontend.form.name')}}:</label>
                <input type="text" class="form-control" name="buyer_name" required>
            </div>

            <div class="col-xs-12 form-field">
              <label for="buyer_email">{{trans('ibooking::frontend.form.email')}}:</label>
              <input type="email" class="form-control" name="buyer_email" required>
            </div>

            <div class="col-xs-12 form-field">
              <label for="buyer_phone">{{trans('ibooking::frontend.form.phone')}}:</label>
              <input type="text" class="form-control" name="buyer_phone" required>
            </div>

            <input type="hidden" name="buyer_eventID" id="buyer_eventID" value="{{$event->id}}">
            
            <div class="clearfix"></div>
          </div>
           

            <div class="col-xs-12 text-center btn-ibooking-form">
              <button type="submit" class="btn btn-primary btn-ibooking">
                {{trans('ibooking::frontend.button.pay')}}
              </button>
            </div>


         </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
      
</div>