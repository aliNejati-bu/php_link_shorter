<?php


return [
    'lang' => 'en',
    'app_url' => 'http://localhost:8000',
    'routes' => [
        'index' => '/',
        'signup' => "/sign-up",
        'login' => '/login',
        'panel' => '/panel',
        'userList' => '/panel/user',
        'createSimpleLink' => '/panel/simple-link',
        'createAdvanceLink' => '/panel/advance-link',
        'adminPanel' => '/panel/admin',
        'createPost' => '/panel/admin/createPost',
        'postList' => '/panel/admin/post-list',
        'deletePost' => '/panel/admin/post/delete/!-!',
        'blog' => '/blog',
        'post' => '/blog/post/!-!',
        'upgrade' => '/panel/upgrade',
        'verifyPr' => '/panel/verifyPr',
        'about' => '/about',
    ],
];