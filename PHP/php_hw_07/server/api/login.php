<?php
include_once "./json-funcitons.php";
const USERS_JSON = "../json/users.json";

$users = getJSON(USERS_JSON);
$userLogin = $_POST["login"] ?? "";
$userPassword = md5("094765442305" . md5("fruit-site_ytuytzfsear" . $_POST["password"] . "./,.sadwq;grt;ew") . "2136843934") ?? "";
$role = getUserRole($users, $userLogin);

if (isSetUser($userLogin, $users) && isSetUser($userPassword, $users)) {
    setcookie("login", $userLogin, time() + 360, "/");
    setcookie("role", $role, time() + 360, "/");
    echo json_encode($role);
} else {
    setcookie("login", "", time() - 42000, "/");
    setcookie("role", "", time() - 42000, "/");
    echo json_encode("error");
}

function isSetUser($userData, $usersArray)
{
    foreach ($usersArray as $key) {
        if (in_array($userData, $key)) {
            return true;
        }
    }

    return false;
}

function getUserRole($usersArray, $userLogin)
{
    foreach ($usersArray as $user) {
        if ($user["userName"] == $userLogin) {
            return $user["role"];
        }
    }
}

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT,POST,GET,DELETE,OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Headers: Content-Length");
header("Access-Control-Allow-Headers: Authorization");
header("Access-Control-Allow-Headers: Accept");
