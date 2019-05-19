<?php

/**
 * @var \Illuminate\Routing\Router $router
 */
$router->get('/', [
    'as' => 'get_main_page',
    'uses' => 'Controller@index',
]);

$router->any('/{uid}', [
    'as' => 'redirect',
    'uses' => 'Controller@redirect',
]);
