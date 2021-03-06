<?php

namespace Electro\App\Controller;

use Electro\App\Model\User;
use Electro\Classes\{Auth, Exception\ValidatorNotFoundException, Redirect, Request, ViewEngine};

class IndexController
{
    public function getIndex(): Redirect
    {
        return \redirect(route("panel"));
    }

    public function getSignUp(): ViewEngine
    {
        $title = "ثبت نام";
        return view("auth>signUp", compact("title"));
    }

    /**
     * @return Redirect
     * @throws ValidatorNotFoundException
     */
    public function postSignUp(): Redirect
    {
        Request::getInstance()->validatePostsAndFiles("signUpValidator");

        $user = User::create(request()->getValidated());
        if ($user) {
            return redirect(route('login'))->withMessage("login", "ورود با موفقیت انجام شد.");
        }
        return redirect(back())->with("error", "متاسفانه کاربر ایجاد نشد.");

        // TODO:: برسی فعال بودن تیک قوانین ما
    }

    /**
     * @return ViewEngine
     */
    public function getLogin(): ViewEngine
    {
        $title = "ورود";
        return view("auth>login", compact("title"));
    }


    /**
     * @throws ValidatorNotFoundException
     */
    public function postLogin()
    {
        request()->validatePostsAndFiles("auth" . DIRECTORY_SEPARATOR . "loginValidator");
        $auth = new Auth();
        $loginStatus = $auth->doLogin(
            Request::getInstance()->getValidated()["email"],
            Request::getInstance()->getValidated()["password"],
            Request::getInstance()->getValidated()["isLong"] == "1"
        );
        if (!$loginStatus) {
            return redirect(back())->with("error", "نام کاربری و رمز عبور همخوانی ندارد.");
        }
        return redirect(route("panel"))->withMessage('message', "ورود موفقیت آمیز بود.");
    }

    public function getAbout(): ViewEngine
    {
        return view("about");
    }
}