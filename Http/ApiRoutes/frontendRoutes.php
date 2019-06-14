<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/frontend'], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();
  
  $router->get('/findRDS', [
    'as' => $locale . 'api.ibooking.findrds.findrds',
    'uses' => 'FrontendApiController@findrds',
  ]);
 

});