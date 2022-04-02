<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/foo' => [[['_route' => 'foo_route', 'controller' => 'FooController::indexAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/foo/([0-9]+)(*:20)'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        20 => [
            [['_route' => 'foo_placeholder_route', 'controller' => 'FooController::loadAction'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
