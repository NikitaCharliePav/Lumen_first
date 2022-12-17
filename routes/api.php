<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers;
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

$router->get('/api/v1/products', 'ProductsController@getProducts');
$router->post('/api/v1/order/create', 'OrderController@createOrder');
$router->get('/api/v1/product/{id}', 'ProductsController@getProduct');
$router->get('/api/v1/product-by-name', 'ProductsController@getProductByName');
