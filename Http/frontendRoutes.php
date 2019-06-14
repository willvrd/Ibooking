<?php

use Illuminate\Routing\Router;


if (! App::runningInConsole()) {
   
    $router->group(['prefix' => trans('ibooking::common.uri')], function (Router $router){
            
            $locale = LaravelLocalization::setLocale() ?: App::getLocale();

            $router->get('/', [
                'as' => $locale . '.ibooking.event',
                'uses' => 'PublicController@index',
            ]); 

            $router->get('{slug}', [
                'as' => $locale . '.ibooking.event.slug',
                'uses' => 'PublicController@show',
            ]);

            $router->get('{eventslug}/giftcard', [
                'as' => $locale . '.ibooking.event.giftcard',
                'uses' => 'PublicController@giftcard',
            ]);

            $router->post('/reservation/create', [
                'as' => 'ibooking.reservation.create',
                'uses' => 'PublicController@reservationCreate',
            ]);

            //Ajax routes
            $router->get('findSlots', [
                'as' => 'ibooking.ajax.findslots',
                'uses' => 'PublicController@findSlots',
            ]);

            /*
            

            // New
            $router->post('findListPrices', [
                'uses' => 'PublicController@findListPrices',
            ]);

            // New
            $router->post('findDays', [
                'uses' => 'PublicController@findDays',
            ]);
            

           
            
            // Testing Old
            $router->post('/create2018', [
                'as' => 'ibooking.reservation.create2018',
                'uses' => 'PublicController@createReservation2018',
            ]);

            // Testing News
            $router->post('/create2019', [
                'as' => 'ibooking.reservation.create2019',
                'uses' => 'PublicController@createReservation2019',
            ]);

           
            */

         

    });

    /*
    $router->group(['prefix' => 'giftcard'], function (Router $router){

        $locale = LaravelLocalization::setLocale() ?: App::getLocale();

        $router->get('{eventslug}', [
            'as' => $locale . '.ibooking.giftcard.event',
            'uses' => 'PublicController@giftcard',
        ]);

    });
    
    */
   
}  