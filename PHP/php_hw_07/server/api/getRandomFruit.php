<?php
include_once "../vendor/functions.php";

$count = (int)($_POST["count"] ?? "1");
$fruits = getJSON(FRUITS_JSON);
$rand = [];

for ($i = 1; $i <= $count; $i++) {
    $rand[] = getRandFruit($fruits);
}

echo json_encode($rand);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
