<?php
session_start();

spl_autoload_register(function ($class) {
    $fileName = $class . ".php";

    if (file_exists($fileName)) {
        include_once $fileName;
    }
});

$user = new \models\User($_POST);
$app = new \core\App();

if (isset($_SESSION["auth"]) && $_SESSION["auth"] === 1) {
    $app->setController("user");
    $app->setLayout("logged");
    $app->setActionName("message");
} else {
    setcookie("PHPSESSID", session_id(), time() - 3600, "/");
    session_destroy();
}

$app->run();

?>

<link rel="stylesheet" href="css/main.css">