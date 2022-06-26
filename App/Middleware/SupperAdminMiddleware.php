<?php

namespace Electro\App\Middleware;

class SupperAdminMiddleware implements \Electro\Boot\Interfaces\MiddlewareInterface
{

    public function run()
    {
        if (!auth()->userModel->isSuperAdmin()) {
            redirect(route("login"))->with("error", "با حساب مدیر وارد شوید.")->exec();
        }
    }
}