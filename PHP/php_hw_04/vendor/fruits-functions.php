<?php

$fruitCreate = $_POST["fruitCreate"] ?? "";

$jsonString = file_get_contents("fruits.json");
$fruits = json_decode($jsonString, true);

if ($fruitCreate == "create fruit") {
    $fruitName = $_POST["fruitName"] ?? "";
    $fruitType = $_POST["fruitType"] ?? "";
    $fruitPrice = (int)$_POST["fruitPrice"] ?? "";
    $fruitCount = (int)$_POST["fruitCount"] ?? "";

    array_push($fruits, ["name" => $fruitName, "type" => $fruitType, "price" => $fruitPrice, "count" => $fruitCount]);

    $jsonString = json_encode($fruits);
    file_put_contents("fruits.json", $jsonString);
    header("Location: index.php?page=main");
}

$isSelect = function ($value) use ($course) {
    if ($value === $course) {
        return true;
    }

    return false;
};
