<?php

use App\Core\App;
use App\Core\Auth;
use App\Core\Config;
use App\Core\DB;
use App\Core\Router;


function app(): App
{
    return App::getApp();
}

function auth(): Auth
{
    return app()->auth();
}

function router(): Router
{
    return app()->router();
}

function config(): Config
{
    return app()->config();
}

function db(): DB
{
    return app()->db();
}

function dd(...$val){
    var_dump($val);
    exit;
}

function dump(...$val){
    var_dump($val);
}