<?php

use Electro\App\Controller\ClickController;
use Phroute\Phroute\RouteCollector;
use Electro\App\Controller\PanelController;

/**
 * @var RouteCollector $router
 */


$router->controller(route("index"), \Electro\App\Controller\IndexController::class);


$router->group(["before" => ["authMiddleware"], "prefix" => route("panel")], function (RouteCollector $router) {
    $router->get("/", function () {
        return (new PanelController)->index();
    });
    $router->controller("/user", \Electro\App\Controller\Admin\UserController::class
    );

    $router->post("/simple-link", function () {
        return (new PanelController())->postSimpleLink();
    });

    $router->post("/advance-link", function () {
        return (new PanelController())->postAdvanceLink();
    });

    $router->get("/advance-link", function () {
        if (!auth()->userModel->user_type) {
            return \redirect(back())->with("e", "برای ایجاد لینک با اسلاگ دلخواه باید حساب طلایی داشته باشید");
        }
        return view("panel>advanceLink");
    });


});

$router->get("/{slug}", function ($slug) {
    return (new ClickController())->index($slug);
});
