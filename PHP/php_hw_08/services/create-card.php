<?php

const BASE_DIRECTORY = "uploads";
$files = $_FILES["image"];

foreach ($files["error"] as $key => $error) {
   if ($error == UPLOAD_ERR_OK) {
      $tmp_name = $files["tmp_name"][$key];
      $name = $files["name"][$key];

      $info = pathinfo($name);
      $ext = $info["extension"];

      $newPath = "../" . BASE_DIRECTORY . "/" . time() . "_" . $name;
      move_uploaded_file($tmp_name, $newPath);
   }
}

// header("Location: ../index.php");