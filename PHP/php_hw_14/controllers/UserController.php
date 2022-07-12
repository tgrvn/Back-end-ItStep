<?php

namespace controllers;

use core\Controller;

class UserController extends Controller
{
    public function message()
    {
        return $this->render("message");
    }
}
