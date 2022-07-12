<?php

namespace models;

class Json
{
    private $usersJSON = "models/json/users.json";

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
}
