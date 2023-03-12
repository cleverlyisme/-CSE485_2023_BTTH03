<?php

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

// Define your routes here
$routesArray = [
    [
        'path' => '/',
        'controller' => 'HomeController',
        'action' => 'index'
    ],
    [
        'path' => '/articles/{id}',
        'controller' => 'DetailController',
        'action' => 'index'
    ],
    [
        'path' => '/admin',
        'controller' => 'AdminController',
        'action' => 'index'
    ],
    [
        'path' => '/articles/{id}',
        'controller' => 'DetailController',
        'action' => 'index'
    ],
    [
        'path' => '/{undefinedRoute}',
        'controller' => 'HomeController',
        'action' => 'index'
    ]
];

foreach ($routesArray as $route) {
    $path = $route['path'];
    $controller = $route['controller'];
    $action = $route['action'];

    $routes->add($route['path'], new Route($route['path'], [
        '_controller' => $controller,
        '_action' => $action
    ]));
}

$routes->add('/{undefinedRoute}', new Route('/{undefinedRoute}', [
    '_controller' => function () {
        return new RedirectResponse('/', 301);
    }
]));

return $routes;
