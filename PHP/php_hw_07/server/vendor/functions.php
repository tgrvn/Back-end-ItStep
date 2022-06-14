<?php

const FRUITS_JSON = "../json/fruits.json";
const USERS_JSON = "../json/users.json";


function getJSON($str)
{
    $strJSON = "[]";

    if (file_exists($str)) {
        $strJSON = file_get_contents($str);
    }

    return json_decode($strJSON, true);
}

function setJSON($fruits, $str)
{
    $strJSON = json_encode($fruits);
    file_put_contents($str, $strJSON);
}

function getRandFruit($fruits)
{
    return $fruits[rand(0, (count($fruits) - 1))];
}
