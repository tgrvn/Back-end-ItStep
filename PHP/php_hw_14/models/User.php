<?php

class User
{
    private $usersJSON = "models/json/users.json";
    private $userLogin;
    private $userPassword;

    function __construct($mss)
    {
        if (isset($mss["user-login"])) {
            $this->userLogin = $mss["log"];
            $this->userPassword = $mss["pass"];
            $this->isAuth();
        }
    }

    public function getJSON()
    {
        if (file_exists($this->usersJSON)) {
            $strJSON = file_get_contents($this->usersJSON);

            return json_decode($strJSON, true);
        }
    }

    public function setJSON($mss)
    {
        $users = $this->getJSON();
        $users[] = $mss;

        $strJSON = json_encode($users);
        file_put_contents($this->usersJSON, $strJSON);
    }

    public function isAuth()
    {
        $users = $this->getJSON();
        $userData = ["username" => $this->userLogin, "password" => $this->userPassword];

        if (in_array($userData, $users)) {
            session_start();
            $_SESSION["auth"] = 1;
            session_write_close();
        } else {
            session_start();
            $_SESSION["auth"] = 0;
            session_write_close();
        }
    }
}
