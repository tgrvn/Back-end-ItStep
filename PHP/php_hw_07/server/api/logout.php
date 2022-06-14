<?php
session_start();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}
session_destroy();

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
