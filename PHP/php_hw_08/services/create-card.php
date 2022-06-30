<?php
include_once "../vendor/json.php";

const BASE_DIRECTORY = "uploads";
const AUUTHORS_JSON = "../json/authors.json";

$files = $_FILES["image"] ?? "";
$authorName = $_POST["author_name"] ?? "";
$descr = $_POST["descr"] ?? "";

$authors = getJSON(AUUTHORS_JSON);
$srcs = [];

foreach ($files["error"] as $key => $error) {
   if ($error == UPLOAD_ERR_OK) {
      $tmp_name = $files["tmp_name"][$key];
      $name = $files["name"][$key];

      $info = pathinfo($name);
      $ext = $info["extension"];
      $path = "../" . BASE_DIRECTORY . "/" . time() . "_" . $name;


      $srcs[] = ["img_$key" => $path];

      move_uploaded_file($tmp_name, $path);
   }
}

$authors = ["autor_name" => $authorName, "img" => $srcs, "descr" => $descr];

setJSON(AUUTHORS_JSON, $authors);


// header("Location: ../index.php");