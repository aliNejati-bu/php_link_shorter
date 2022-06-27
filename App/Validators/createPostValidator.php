<?php

use Electro\Classes\Validator\Rules;

return [
    "title" => ['required', 'min:3'],
    "slug" => ['required', Rules::unique(\Electro\App\Model\News::class, "slug"),],
    "image" => ['required', 'min:3'],
    "content" => ["required"]
];
