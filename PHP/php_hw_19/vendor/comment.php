<?php

include_once "../models/travels.php";

$travels = new Travels();

if (isset($_POST["comment"])) {
    $commentText = $_POST["comm"] ?? "";
    $userId = $_POST["id_user"] ?? "";
    $hotelId = $_POST["id_hotel"] ?? "";

    $travels->setComment($commentText, $hotelId, $userId);
}

header("location: ../index.php?page=" . $_GET["page"] . "&id=" . $_GET["id"]);
