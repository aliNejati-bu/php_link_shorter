<?php

namespace Electro\App\Controller;

use Electro\Classes\Auth;
use Electro\Classes\Exception\ValidatorNotFoundException;

class ApiAuth
{
    /**
     * @throws ValidatorNotFoundException
     */
    public function login()
    {
        request()->validatePostsAndFiles("loginApiValidator");
        $authInstance = new Auth();
        $loginResult = $authInstance->loginApiGetToken(request()->getValidated()["email"], request()->getValidated()["password"]);
        if (!$loginResult) {
            http_response_code(403);
            return responseJson(false, [], "user name password not match.");
        }
        return responseJson(true, ["login success."], ["token" => $loginResult]);
    }
}