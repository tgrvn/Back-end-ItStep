<?php
session_start();
include_once "../models/travels.php";

$travels = new Travels();

if (isset($_POST["log"])) {
    $login = $_POST["login"] ?? "";
    $password = $_POST["pass"] ?? "";
    $userData = $travels->getUserByData($login, $password);

    if (!empty($userData)) {
        $_SESSION["userId"] = $userData["id"];
        $_SESSION["role"] = $userData["id_role"];
        $_SESSION["userLogin"] = $userData["login"];
        session_write_close();
    } else {
        $_SESSION["loginStatus"] = "wrong login or password";
        session_write_close();
    }
}

header("location: ../index.php");
