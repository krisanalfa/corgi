<?php

$app->group(['middleware' => ['jwt.auth']], function () use ($app) {
    //
});

$app->get('/', 'SiteController@index');

$app->post('/auth/login', 'Auth\AuthController@postLogin');
