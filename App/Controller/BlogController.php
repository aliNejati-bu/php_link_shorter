<?php

namespace Electro\App\Controller;

use Electro\App\Model\News;
use Electro\Classes\ViewEngine;

class BlogController
{
    public function index(): ViewEngine
    {
        $posts = News::all();
        return view("blog>index",compact("posts"));
    }
}