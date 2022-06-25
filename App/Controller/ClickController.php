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

    public function showLinkStats(string $slug)
    {
        /**
         * @var Link $link
         */
        $link = Link::query()->where("slug", $slug)->first();

        if (!$link) {
            http_response_code(404);
            return view(get404ViewName());
        }
/*        if (!auth()->userModel->)*/
    }
    
}