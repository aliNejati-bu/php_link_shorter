<?php

namespace Electro\App\Controller;

use Electro\App\Model\Link;
use Electro\Classes\Config;
use Electro\Classes\Exception\ValidatorNotFoundException;
use JetBrains\PhpStorm\ArrayShape;

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

    /**
     * @param $slug
     * @return array
     */
    #[ArrayShape(["status" => "bool", "messages" => "array", "data" => "mixed"])] public function getStats($slug): array
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

    /**
     * @return array
     * @throws ValidatorNotFoundException
     */
    #[ArrayShape(["status" => "bool", "messages" => "array", "data" => "mixed"])] public function createLink(): array
    {
        request()->validatePostsAndFiles("createAdvanceLinkValidator");


        if (!startsWith(request()->getValidated()["link"], "https://") && !startsWith(request()->getValidated()["link"], "http://")) {
            $link = "https://" . request()->getValidated()["link"];
        } else {
            $link = request()->getValidated()["link"];
        }
        Link::query()->create([
            "user_id" => auth()->userModel->id,
            "slug" => request()->getValidated()["slug"],
            "target" => $link
        ]);
        $config = Config::getInstance()->getAllConfig("app");
        return responseJson(true, ["link Created."], [
            "link" => $config["app_url"]."/".request()->getValidated()["slug"]
        ]);
    }
}