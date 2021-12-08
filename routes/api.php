<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Capsule\Manager as Capsule;

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

$router->group(['prefix' => 'api'], function () use($router) {
    $router->group(['prefix' => 'auth'], function () use($router) {
        $router->post('register','Api\UserApiController@register');
        $router->post('logout','Api\AuthController@logout');
        $router->post('login','Api\AuthController@login');
    });

    $router->group(['middleware' => 'jwt'], function () use($router) {
        $router->get('users','Api\UserApiController@users');
        $router->get('user/{_id}','Api\UserApiController@user');
        $router->post('user/{_id}','Api\UserApiController@update');
        $router->delete('user/{_id}','Api\UserApiController@destroy');
    });
});
