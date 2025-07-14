<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../core/functions.php';

use Core\Router;

$router = new Router();

require_once __DIR__ . '/../routes.php';

$router->dispatch();