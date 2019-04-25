<?php

/**
 * @apiGroup       Links
 * @apiName        findByUid
 * @api            {get} /v1/links/findByUid/:uid Find Link By Uid
 * @apiDescription Find a Link by its Uid
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
    'links/findByUid/{uid}', [
    'as' => 'api_link_find_by_uid',
    'uses' => 'Controller@findByUid',
    ]
);
