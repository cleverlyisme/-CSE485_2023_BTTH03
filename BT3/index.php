<?php
include 'includes/bootstrap.php';
require_once 'vendor/autoload.php';

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Define your routes
$routes = require_once 'includes/routes.php';

// Initialize the routing context
$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);

// Match the current request to a route
$matcher = new UrlMatcher($routes, $context);
try {
    $parameters = $matcher->match($request->getPathInfo());

    $controllerClass = $parameters['_controller'];
    $controllerMethod = $parameters['_action'];
    $controller = new $controllerClass();
    $response = $controller->$controllerMethod($parameters);
} catch (Exception $e) {
    // Handle any exceptions thrown by the controller methods
    $response = new Response('An error occurred: ' . $e->getMessage(), 500);
}

// Send the response to the browser
$response->send();

// Error handling middleware
function handleError($exception, $request, $debug)
{
    $response = new Response('An error occurred: ' . $exception->getMessage(), 500);
    return $response;
}
