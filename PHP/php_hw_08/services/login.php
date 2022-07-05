<?php
include_once "../vendor/json.php";

const USERS_JSON = "../json/users.json";

$log = $_POST["log"] ?? "";
$pass = $_POST["pass"] ?? "";
$users = getJSON(USERS_JSON);

if (!empty($log) && !empty($pass)) {
    $userData = ["username" => $log, "password" => md5(md5($pass))];

    if (in_array($userData, $users)) {
        session_start();
        $_SESSION["auth"] = 1;

        header("location: ../index.php");
    } else {
        session_start();
        $_SESSION["auth"] = 0;

        header("location: ../index.php");
    }
}
