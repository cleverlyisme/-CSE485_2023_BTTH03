<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routesArray = [
    [
        'path' => '/',
        'controller' => 'HomeController',
        'action' => 'index'
    ],
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
        'path' => '/article',
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
    [
        'path' => '/auth/logout',
        'controller' => 'AuthController',
        'action' => 'logout'
    ],
    [
        'path' => '/admin/home',
        'controller' => 'AdminController',
        'action' => 'index'
    ],
    [
        'path' => '/admin/categories',
        'controller' => 'CategoryController',
        'action' => 'index'
    ],
    [
        'path' => '/admin/add_category',
        'controller' => 'CategoryController',
        'action' => 'add'
    ],
    [
        'path' => '/admin/edit_category',
        'controller' => 'CategoryController',
        'action' => 'edit'
    ],
    [
        'path' => '/admin/delete_category',
        'controller' => 'CategoryController',
        'action' => 'delete'
    ],
    [
        'path' => '/admin/category/insert',
        'controller' => 'CategoryController',
        'action' => 'insert'
    ],
    [
        'path' => '/admin/category/update',
        'controller' => 'CategoryController',
        'action' => 'update'
    ],
    [
        'path' => '/admin/category/delete',
        'controller' => 'CategoryController',
        'action' => 'remove'
    ],
    [
        'path' => '/admin/authors',
        'controller' => 'AuthorController',
        'action' => 'index'
    ],
    [
        'path' => '/admin/add_author',
        'controller' => 'AuthorController',
        'action' => 'add'
    ],
    [
        'path' => '/admin/edit_author',
        'controller' => 'AuthorController',
        'action' => 'edit'
    ],
    [
        'path' => '/admin/delete_author',
        'controller' => 'AuthorController',
        'action' => 'delete'
    ],
    [
        'path' => '/admin/author/insert',
        'controller' => 'AuthorController',
        'action' => 'insert'
    ],
    [
        'path' => '/admin/author/update',
        'controller' => 'AuthorController',
        'action' => 'update'
    ],
    [
        'path' => '/admin/author/delete',
        'controller' => 'AuthorController',
        'action' => 'remove'
    ],
    [
        'path' => '/admin/articles',
        'controller' => 'ArticleController',
        'action' => 'index'
    ],
    [
        'path' => '/admin/add_article',
        'controller' => 'ArticleController',
        'action' => 'add'
    ],
    [
        'path' => '/admin/edit_article',
        'controller' => 'ArticleController',
        'action' => 'edit'
    ],
    [
        'path' => '/admin/delete_article',
        'controller' => 'ArticleController',
        'action' => 'delete'
    ],
    [
        'path' => '/admin/article/insert',
        'controller' => 'ArticleController',
        'action' => 'insert'
    ],
    [
        'path' => '/admin/article/update',
        'controller' => 'ArticleController',
        'action' => 'update'
    ],
    [
        'path' => '/admin/article/delete',
        'controller' => 'ArticleController',
        'action' => 'remove'
    ],
    [
        'path' => '/admin/users',
        'controller' => 'UserController',
        'action' => 'index'
    ],
    [
        'path' => '/admin/add_user',
        'controller' => 'UserController',
        'action' => 'add'
    ],
    [
        'path' => '/admin/edit_user',
        'controller' => 'UserController',
        'action' => 'edit'
    ],
    [
        'path' => '/admin/delete_user',
        'controller' => 'UserController',
        'action' => 'delete'
    ],
    [
        'path' => '/admin/user/insert',
        'controller' => 'UserController',
        'action' => 'insert'
    ],
    [
        'path' => '/admin/user/update',
        'controller' => 'UserController',
        'action' => 'update'
    ],
    [
        'path' => '/admin/user/delete',
        'controller' => 'UserController',
        'action' => 'remove'
    ],
    [
        'path' => '/{undefinedRoute}',
        'controller' => 'HomeController',
        'action' => 'index'
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