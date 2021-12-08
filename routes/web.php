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

//$router->get('/', function () use ($router) {
//    $capsule = new Capsule;
//
//    $capsule->getDatabaseManager()->extend('mongodb', function($config, $name) {
//        $config['name'] = $name;
//
//        return new Jenssegers\Mongodb\Connection($config);
//    });
//
//    $capsule->addConnection([
//        'driver' => 'mongodb',
//        'host' => '127.0.0.1',
//        'database' => 'testing_monggo',
//        'username' => '',
//        'password' => '',
//    ]);
//    $capsule->setAsGlobal();
//
//    return Capsule::table('users')->get();
//});

$router->get('/', 'ExampleController@detailBills');
