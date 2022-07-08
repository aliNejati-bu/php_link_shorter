<?php

namespace Electro\App\Controller;

use Electro\App\Model\Link;

class AppApi
{
    public function __construct()
    {
        if (!auth()->userModel->user_type) {
            http_response_code(403);
            echo json_encode(responseJson(false, [], "only super admins can use api."));
            die();
        }
    }

    public function getStats($slug)
    {
        /**
         * @var Link $link
         */
        $link = Link::query()->where("slug", $slug)->first();

        if (!$link) {
            http_response_code(404);
            return responseJson(false, [], "slug Not exists.");
        }
        $all = $link->clicks()->count();
        $daily = $link->clicks()->where("created_at", ">", getStartDay())->count();
        return responseJson(true, ["ok"], [
            "daily" => $daily,
            "all" => $all
        ]);
    }
}