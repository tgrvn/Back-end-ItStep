<?php

const FRUITS_JSON = "../json/fruits.json";

function getJSON()
{
    $strJSON = "[]";

    if (file_exists(FRUITS_JSON)) {
        $strJSON = file_get_contents(FRUITS_JSON);
    }

    return json_decode($strJSON, true);
}

function setJSON($fruits)
{
    $strJSON = json_encode($fruits);
    file_put_contents(FRUITS_JSON, $strJSON);
}

function getRandFruit($fruits)
{
    return $fruits[rand(0, (count($fruits) - 1))];
}