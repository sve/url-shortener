<?php

/**
 * @apiGroup       Links
 * @apiName        create
 * @api            {post} /v1/links Create Link
 * @apiDescription Create Link
 *
 * @apiVersion    1.0.0
 * @apiPermission none
 *
 * @apiParam {String}  url
 *
 * @apiUse LinkSuccessSingleResponse
 */

/**
 * @var \Illuminate\Routing\Router $router
 */
$router->post(
    'links', [
    'as' => 'api_link_create',
    'uses' => 'Controller@store',
    ]
);
