<?php
session_start();

include_once "../models/travels.php";

$travels = new Travels();

if (isset($_POST["reg"])) {
    $login = $_POST["login"] ?? "";
    $email = $_POST["email"] ?? "";
    $pass = $_POST["pass"] ?? "";
    $rePass = $_POST["repass"] ?? "";
    $errors = [];

    if ($pass !== $rePass) {
        $errors[] = "passwords not same";
    }

    if (!!$travels->isSetUser($login, $email)) {
        $errors[] = "user exists";
    }

    if (count($errors) > 0) {
        $_SESSION["errors"] = $errors;
        session_write_close();
        header("location: ../index.php?page=3");
    } else if (count($errors) == 0) {
        $travels->setNewUser($login, $pass, $email);
        $_SESSION["regStatus"] = "You are registered now";
        session_write_close();
        header("location: ../index.php?page=3");
    }
}
