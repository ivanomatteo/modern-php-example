<?php

use App\Core\App;

require __DIR__ . '/../vendor/autoload.php';

App::getApp()->router()->routeRequest();
