<?php

include_once "./functions.php";

$fruits = getJSON();

echo json_encode($fruits);

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
