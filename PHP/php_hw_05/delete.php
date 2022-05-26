<?php

$jsonString = file_get_contents('fruits.json');
$fruits = json_decode($jsonString, true);

$id = $_GET['id'];


if ($id !== "") {
    array_splice($fruits, $id, 1);
    $jsonString = json_encode($fruits);
    file_put_contents('fruits.json', $jsonString);
}

header("Location: index.php?page=main");
