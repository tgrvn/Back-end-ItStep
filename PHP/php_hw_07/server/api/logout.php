<?php

setcookie("role", "", time() - 42000, "/");
setcookie("login", "", time() - 42000, "/");


echo json_encode("logout");

header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT,POST,GET,DELETE,OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Headers: Content-Length");
header("Access-Control-Allow-Headers: Authorization");
header("Access-Control-Allow-Headers: Accept");
