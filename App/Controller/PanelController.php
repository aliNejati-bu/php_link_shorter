<?php

namespace Electro\App\Controller;

use Electro\App\Model\Link;
use Electro\Classes\Exception\ValidatorNotFoundException;
use Electro\Classes\Redirect;
use Electro\Classes\ViewEngine;

class PanelController
{

    /**
     * @return ViewEngine|Redirect
     */
    public function index(): ViewEngine|Redirect
    {
        return view("panel>panel");
    }

    /**
     * @throws ValidatorNotFoundException
     */
    public function postSimpleLink(): ViewEngine
    {
        request()->validatePostsAndFiles("createLink");

        $slug = getRandomString(5);

        if (!startsWith(request()->getValidated()["link"], "https://") && !startsWith(request()->getValidated()["link"], "http://")) {
            $link = "https://" . request()->getValidated()["link"];
        } else {
            $link = request()->getValidated()["link"];
        }

        while (Link::query()->where("slug", $slug)->first()) {
            $slug = getRandomString(5);
        }

        Link::query()->create([
            "user_id" => auth()->userModel->id,
            "slug" => $slug,
            "target" => $link
        ]);

        return view("panel>showLink", compact("slug"));
    }

}