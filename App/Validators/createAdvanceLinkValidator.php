<?php

return [
    "link" => ['required', 'min:3'],
    "slug" => ['required', \Electro\Classes\Validator\Rules::unique(\Electro\App\Model\Link::class, "slug")]
];