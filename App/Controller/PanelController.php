<?php

namespace Electro\App\Controller;

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


    }

}