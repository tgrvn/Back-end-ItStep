<?php

function getJSON($path)
{
    $strJSON = "[]";

    if (file_exists($path)) {
        $strJSON = file_get_contents($path);
    }

    return json_decode($strJSON, true);
}

function setJSON($path, $mss)
{
    $strJSON = json_encode($mss);
    file_put_contents($path, $strJSON);
}

function isSetUser($userMss, $userData)
{
    if (in_array($userData, $userMss)) {
        return true;
    }

    return false;
}
