<?php

namespace controllers;

use core\Controller;

class DefaultController extends Controller
{
    public function register()
    {
        return $this->render("register");
    }

    public function login()
    {
        return $this->render("login");
    }
}
