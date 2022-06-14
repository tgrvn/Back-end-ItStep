<?php

include_once "../vendor/functions.php";

$fruits = getJSON(FRUITS_JSON);

echo json_encode($fruits);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");