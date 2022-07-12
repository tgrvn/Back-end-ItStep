<?php
include_once "./models/control.php";
include_once "./models/input.php";
include_once "./models/button.php";
include_once "./models/text.php";
include_once "./models/label.php";

$widgets = [
    $input = new Text("#fff", "max-content", "30px", "text-data", "", "print some..."),
    $btn = new Button("green", "max-content", "", "send-form", "send"),
    $label = new Label("yellow", "60px", "60px", "label" , $input)
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php foreach ($widgets as $widget) {
        $widget->render();
    } ?>
</body>

</html>