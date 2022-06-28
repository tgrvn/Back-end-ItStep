<?php

include_once "../vendor/functions.php";

$users = getJSON(USERS_JSON);

$userName = $_POST["userName"] ?? "";
$userPassword = md5("094765442305" . md5("fruit-site_ytuytzfsear" . $_POST["password"] . "./,.sadwq;grt;ew") . "2136843934") ?? "";

$createdUser = ["userName" => $userName, "password" => $userPassword, "role" => "user"];

$users[] = $createdUser;

setJSON($users, USERS_JSON);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

echo json_encode("sucsess");
