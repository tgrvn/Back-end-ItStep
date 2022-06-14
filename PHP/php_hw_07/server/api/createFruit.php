<?php
include_once "../vendor/functions.php";

$fruits = getJSON(FRUITS_JSON);

$name = $_POST["name"] ?? "";
$type = $_POST["type"] ?? "";
$count = $_POST["count"] ?? "";
$price = $_POST["price"] ?? "";

$fruitCreated = ["name" => $name, "type" => $type, "count" => $count, "price" => $price];

$fruits[] = $fruitCreated;

setJSON($fruits, FRUITS_JSON);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

echo json_encode($fruitCreated);
