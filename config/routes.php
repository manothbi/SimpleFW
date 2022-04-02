<?php 
/*
// config/routes.php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

/*
** Route('path', 'controller');
*
$routes = new RouteCollection();
$routes->add('new', new Route('/new/{page}', [
    '_controller' => 'App\Controller\NewController::index',
    'page'        => 1,
    'title'       => 'Hello world!',
]));

*/
$routes = [
        '/new' =>
        [
            'name' => 'new',
            'controller' => 'NewController::index'
        ],
        '/new/:id' =>
        [
            'name' => 'show',
            'controller' => 'NewController::show'
        ],
        '/comment' =>
        [
            'name' => 'comment',
            'controller' => 'CommentController::index'
        ],
        '/comment/:id' =>
        [
            'name' => 'comment',
            'controller' => 'CommentController::show'
        ]
    ];
return $routes;