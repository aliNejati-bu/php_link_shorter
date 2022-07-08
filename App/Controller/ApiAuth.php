<?php

namespace Electro\App\Controller;

use Electro\App\Model\Link;
use Electro\Classes\Auth;
use Electro\Classes\Exception\ValidatorNotFoundException;
use JetBrains\PhpStorm\ArrayShape;

class ApiAuth
{
    /**
     * @return array
     * @throws ValidatorNotFoundException
     */
    #[ArrayShape(["status" => "bool", "messages" => "array", "data" => "mixed"])] public function login(): array
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