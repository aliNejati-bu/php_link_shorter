<?php
/**
 * @var RouteCollector $router
 */

use Phroute\Phroute\RouteCollector;

$router->post("/login", function () {
    return (new \Electro\App\Controller\ApiAuth())->login();
});

$router->group(["before" => "apiAuthMiddleware"], function (RouteCollector $router) {
    $router->get("/{slug}/stats", function ($slug) {
        return (new \Electro\App\Controller\AppApi())->getStats($slug);
    });

    $router->post("/createLink", function () {
        return (new \Electro\App\Controller\AppApi())->createLink();
    });
});