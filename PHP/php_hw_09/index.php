<?php
session_start();
include_once "./models/json.php";
include_once "./models/product.php";

$product = new Product($_POST);

if (isset($_SESSION["finded"]) && is_array($_SESSION["finded"])) {
    if (count($_SESSION["finded"]) > 0) {
        $findedProds = $_SESSION["finded"];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
</head>

<body>
    <style>
        .products {
            padding: 20px 0;
        }

        .product {
            display: flex;
            gap: 20px;
        }
    </style>

    <?php
    include_once "./views/add-product.php";
    include_once "./views/products.php";
    include_once "./views/search.php";
    ?>

    <div class="products">
        <?php if (isset($findedProds)) { ?>
            <?php foreach ($findedProds as $product) { ?>
                <div class="product">
                    <h3><?= $product["name"] ?></h3>
                    <h3><?= $product["price"] ?>$</h3>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>not found...</p>
        <?php } ?>
    </div>
</body>

</html>