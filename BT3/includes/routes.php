<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routesArray = [
    [
        'path' => '/home',
        'controller' => 'HomeController',
        'action' => 'index'
    ],
    [
        'path' => '/search',
        'controller' => 'HomeController',
        'action' => 'search'
    ],
    [
        'path' => '/articles',
        'controller' => 'DetailController',
        'action' => 'index'
    ],
    [
        'path' => '/auth',
        'controller' => 'AuthController',
        'action' => 'index'
    ],
    [
        'path' => '/auth/login',
        'controller' => 'AuthController',
        'action' => 'login'
    ],
];

foreach ($routesArray as $route) {
    $path = $route['path'];
    $controller = $route['controller'];
    $action = $route['action'];

    $routes->add($path, new Route($path, [
        '_controller' => $controller,
        '_action' => $action
    ]));
}

return $routes;
