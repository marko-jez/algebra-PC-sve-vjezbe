<?php

require_once '../vendor/autoload.php';

$router = require_once '../config/routes.php';

use \App\Controllers\HomeController;

$controller = new HomeController();

$controller->render();