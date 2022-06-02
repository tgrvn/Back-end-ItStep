<?php
include_once "./functions.php";

$count = (int)($_POST["count"] ?? "1");
$fruits = getJSON();
$rand = [];

for ($i = 1; $i <= $count; $i++) {
    $rand[] = getRandFruit($fruits);
}

echo json_encode($rand);

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
