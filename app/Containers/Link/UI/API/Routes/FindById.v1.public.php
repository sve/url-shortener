<?php

/**
 * @apiGroup       Links
 * @apiName        findById
 * @api            {get} /v1/links/:id Find Link By Id
 * @apiDescription Find a link by its id
 *
 * @apiVersion    1.0.0
 * @apiPermission none
 *
 * @apiUse LinkSuccessSingleResponse
 */

/**
 * @var \Illuminate\Routing\Router $router
 */
$router->get(
    'links/{id}', [
    'as' => 'api_link_find_by_id',
    'uses' => 'Controller@show',
    ]
);
