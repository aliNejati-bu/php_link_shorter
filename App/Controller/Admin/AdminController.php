<?php

namespace Electro\App\Controller\Admin;

use Electro\App\Model\News;
use Electro\Classes\Exception\ValidatorNotFoundException;
use Electro\Classes\Redirect;
use Electro\Classes\ViewEngine;

class AdminController
{
    /**
     * @return ViewEngine
     */
    public function index(): ViewEngine
    {
        return view('panel>admin>index');
    }

    /**
     * @return ViewEngine
     */
    public function createPostFront(): ViewEngine
    {
        return view("panel>admin>createPost");
    }

    /**
     * @return Redirect
     * @throws ValidatorNotFoundException
     */
    public function createPost(): Redirect
    {
        request()->validatePostsAndFiles("createPostValidator");
        $data = request()->getValidated();
        $imagePath = "uploads/" . time() . "_" . getRandomString(5) . ".jpg";
        copy(request()->allPost()["image"]["tmp_name"], $imagePath);
        $data["image"] = $imagePath;
        News::query()->create($data);
        return redirect(back())->withMessage("m", "پست ایجاد.");
    }

}