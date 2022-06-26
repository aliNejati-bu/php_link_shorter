<?php

namespace Electro\App\Controller;

use Electro\App\Model\Link;
use Electro\Classes\Redirect;
use Electro\Classes\ViewEngine;

class ClickController
{
    /**
     * @param string $slug
     * @return Redirect|ViewEngine
     */
    public function index(string $slug): Redirect|ViewEngine
    {
        /**
         * @var Link $link
         */
        $link = Link::query()->where("slug", $slug)->first();

        if (!$link) {
            http_response_code(404);
            return view(get404ViewName());
        }

        $link->clicks()->create([
            "link_id" => $link->id
        ]);

        return \redirect($link->target);

    }

    /**
     * @param string $slug
     * @return ViewEngine
     */
    public function showLinkStats(string $slug): ViewEngine
    {
        /**
         * @var Link $link
         */
        $link = Link::query()->where("slug", $slug)->first();

        if (!$link) {
            http_response_code(404);
            return view(get404ViewName());
        }
        if (!auth()->userModel->user_type & $link->user->id != auth()->userModel->id) {
            http_response_code(404);
            return view(get404ViewName());
        }

        $all = $link->clicks()->count();
        $daily = $link->clicks()->where("created_at", ">", getStartDay())->count();
        return view("panel>stats", compact("daily", "all", "slug"));

    }

}