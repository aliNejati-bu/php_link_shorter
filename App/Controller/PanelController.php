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
    public function postSimpleLink()
    {
        request()->validatePostsAndFiles("createLink");

        $slug = getRandomString(5);


        while (Link::query()->where("slug", $slug)->first()) {
            $slug = getRandomString(5);
        }

        Link::query()->create([
            "user_id" => auth()->userModel->id,
            "slug" => $slug,
            "target" => request()->getValidated()["link"]
        ]);

        return view("panel>showLink",compact("slug"));
    }

}