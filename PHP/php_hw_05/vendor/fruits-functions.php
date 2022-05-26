<?php


const FRUITS_JSON = "./fruits.json";

$fruits = getFruits();


$fruitCreate = $_POST["fruitCreate"] ?? "";
$fruitEdit = $_POST["fruitEdit"] ?? "";


if ($fruitCreate == "create fruit") {
    setNewFruit($fruits);
    setFruits($fruits);
    header("Location: index.php?page=main");
};

$fruitId = $_GET["id"] ?? "";

if ($fruitEdit == "edit fruit") {
    setEditFruit($fruits, $fruitId);
    setFruits($fruits);
    header("Location: index.php?page=main");
}

function getFruits()
{
    $jsonString = "[]";

    if (file_exists(FRUITS_JSON)) {
        $jsonString = file_get_contents(FRUITS_JSON);
    }

    return json_decode($jsonString, true);
};

function setFruits($fruits)
{
    $jsonString = json_encode($fruits);

    file_put_contents(FRUITS_JSON, $jsonString);
};

function setNewFruit(&$fruits)
{
    $fruitName = $_POST["fruitName"] ?? "";
    $fruitType = $_POST["fruitType"] ?? "";
    $fruitPrice = (int)$_POST["fruitPrice"] ?? "";
    $fruitCount = (int)$_POST["fruitCount"] ?? "";

    array_push($fruits, ["name" => $fruitName, "type" => $fruitType, "price" => $fruitPrice, "count" => $fruitCount]);
};

function setEditFruit(&$fruits, $id)
{
    $fruitName = $_POST["fruitName"] ?? "";
    $fruitType = $_POST["fruitType"] ?? "";
    $fruitPrice = (int)$_POST["fruitPrice"] ?? "";
    $fruitCount = (int)$_POST["fruitCount"] ?? "";

    $fruits[$id] = ["name" => $fruitName, "type" => $fruitType, "price" => $fruitPrice, "count" => $fruitCount];
};

$isSelect = function ($value) use ($course) {
    if ($value === $course) {
        return true;
    }

    return false;
};
