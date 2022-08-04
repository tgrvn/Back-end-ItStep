<?php
session_start();
include_once "../models/travels.php";

$travels = new Travels();

$travels->delComment($_GET["id"], $_SESSION["userId"], $_GET["idComment"]);

header("location: ../index.php?page=" . $_GET["page"] . "&id=" . $_GET["id"]);
