<?php

namespace Electro\App\Controller\Admin;

use Electro\Classes\ViewEngine;

class AdminController
{
    public function index(): ViewEngine
    {
        return view('panel>admin>index');
    }
}