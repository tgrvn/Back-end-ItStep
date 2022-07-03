<?php
session_start();

include_once "../vendor/json.php";

const BASE_DIRECTORY = "uploads";
const AUTHORS_JSON = "../json/authors.json";

$authorName = $_POST["author_name"] ?? "";
$files = $_FILES["image"] ?? "";
$descr = $_POST["descr"] ?? "";
$srcs = [];

$authors = getJSON(AUTHORS_JSON);

if (!empty($authorName) && !empty($descr)) {
   foreach ($files["error"] as $key => $error) {
      if ($error == UPLOAD_ERR_OK) {
         $name = $files["name"][$key];
         $info = pathinfo($name);
         $ext = $info["extension"];

         switch ($ext) {
            case 'jpeg':
            case 'jpg':
            case 'png':
            case 'webp':
               $tmp_name = $files["tmp_name"][$key];
               $path = "../" . BASE_DIRECTORY . "/" . time() . "_" . $name;

               $srcs[] = ["img_$key" => $path];

               move_uploaded_file($tmp_name, $path);
               break;

            default:
               $_SESSION["error"] = "wronng format";
               header("Location: ../gallery.php");
               exit;
         }

         $authors[] = ["autor_name" => $authorName, "img" => $srcs, "descr" => $descr];
         setJSON(AUTHORS_JSON, $authors);
         header("Location: ../index.php");
      }
   }
}
