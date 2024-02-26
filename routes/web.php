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


$router->post('/auth/login',
['uses' => 'AuthController@Autenticate']);

$router->group(
    ['middleware' => 'jwt.auth'],
        function () use ($router) {
            $router->get('/Users/ListUsers', ['uses' => 'UserController@ListUsers']);
            $router->get('/Users/ListBancos', ['uses' => 'UserController@ListBancos']);
            $router->get('/Users/ListPromotor',['uses' => 'UserController@ListPromotor']);

            $router->post('/PreEvaluador/Insert',['uses' => 'PreEvaluadorController@Register']);
        }
);


