<?php
include_once "json.php";

class Product
{
    private $_name;
    private $_price;

    public function __construct($mss)
    {
        if (isset($mss["add-product"])) {
            $this->_name = $mss["name"] ?? "";
            $this->_price = $mss["price"] ?? "";
            $this->setProduct($this->getProduct());
        }

        if (isset($mss["getSearch"])) {
            $this->searchByName($mss["search"]);
            header("Location: index.php");
        }
    }

    public function getProduct()
    {
        return ["name" => $this->_name, "price" => $this->_price];
    }

    public function setProduct($mss)
    {
        if (count($mss) > 0) {
            JSON::setJSON($mss);
            header("Location: index.php");
        }
    }

    private function searchByName($str)
    {
        $products = JSON::getJSON();
        if (count($products) > 0) {
            foreach ($products as $product) {
                if ($product["name"] === $str) {
                    $_SESSION["finded"] = $product;
                    break;
                } else {
                    $_SESSION["finded"] = "404";
                }
            }
        }
    }
}
