<?php

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

$app->group(['middleware' => ['jwt.auth']], function () use ($app) {
    //
});

$app->get('/', 'SiteController@index');

$app->post('/auth/login', 'Auth\AuthController@postLogin');
