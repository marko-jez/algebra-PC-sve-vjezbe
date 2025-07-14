<?php

$router->get('/', 'HomeController', 'homePage');
$router->get('/articles', 'ArticlesController', 'index');
$router->get('/articles-create', 'ArticlesController', 'create');
$router->post('/articles/store', 'ArticlesController', 'store');
$router->get('/articles-edit', 'ArticlesController', 'edit');
$router->post('/articles-update', 'ArticlesController', 'update');
$router->post('/articles-delete', 'ArticlesController', 'destroy');
