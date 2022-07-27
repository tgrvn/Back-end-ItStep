<?php

spl_autoload_register(function ($class) {
    $fileName = $class . ".php";

    if (file_exists($fileName)) {
        include_once $fileName;
    }
});

$app = new core\App();
$app->run();

?>

<link rel="stylesheet" href="./css/main.css">