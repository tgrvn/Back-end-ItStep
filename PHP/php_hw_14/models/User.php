<?php

namespace models;

use models\Json;

class User extends Json
{
    private $userLogin;
    private $userPassword;
    private $userRePassword;
    private $userPhone;
    private $userEmail;


    function __construct($mss)
    {
        if (isset($mss["login-from"])) {
            $this->userLogin = $mss["log"];
            $this->userPassword = $mss["pass"];
            $this->userLoggin();
        }

        if (isset($mss["register-from"])) {
            if ($mss["pass"] === $mss["re-pass"]) {
                $this->userLogin = $mss["log"];
                $this->userPassword = $mss["pass"];
                $this->userEmail = $mss["email"];
                $this->userPhone = $mss["phone"];
                $this->userRePassword = $mss["re-pass"];

                $userData = ["login" => $this->userLogin, "password" => $this->userPassword, "email" => $this->userEmail, "phone" => $this->userPhone];

                $this->setJSON($userData);

                header("location: index.php");
            } else {
                $_SESSION["error"] = "passwords is different";
            }
        }
    }

    private function userLoggin()
    {
        $users = $this->getJSON();
        $isSetUser = false;


        foreach ($users as $user) {
            if ($user["login"] === $this->userLogin && $user["password"] === $this->userPassword) {
                $isSetUser = true;
            }
        }

        if ($isSetUser) {
            $_SESSION["auth"] = 1;
            header("Location: index.php");
        } else {
            $_SESSION["auth"] = 0;
        }
    }
}
