<?php

namespace controllers;

use core\Controller;

class DefaultController extends Controller
{
    public function login()
    {
        return $this->render("login");
    }
}
