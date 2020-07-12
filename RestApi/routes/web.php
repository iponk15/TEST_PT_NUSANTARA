<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('customer',  ['uses' => 'CustomerController@showAllCustomers']);
    $router->get('customer/{id}', ['uses' => 'CustomerController@showOneCustomer']);
    $router->post('customer', ['uses' => 'CustomerController@create']);
    $router->delete('customer/{id}', ['uses' => 'CustomerController@delete']);
    $router->post('customer/{id}', ['uses' => 'CustomerController@update']);

    $router->get('listcust', 'CustomerController@listCust');
    $router->post('storecust', 'CustomerController@storecust');
});
