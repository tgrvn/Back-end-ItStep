<?php
include_once "json.php";

class Product
{
    private $_name;
    private $_price;
    private $_searchValue;

    public function __construct($mss)
    {
        if (isset($mss["add-product"])) {
            $this->_name = $mss["name"] ?? "";
            $this->_price = $mss["price"] ?? "";
            $this->setProduct($this->getProduct());
        }

        if (isset($mss["getSearch"])) {
            $this->_searchValue = $mss["search"];
            $this->searchByName();
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

    private function searchByName()
    {
        $products = JSON::getJSON();

        if (is_array($products)) {
            if (count($products) > 0) {
                $_SESSION["finded"] = array_filter($products, function ($product) {
                    if ($product["name"] === $this->_searchValue) {
                        return true;
                    }

                    return false;
                });
            } else {
                $_SESSION["finded"] = "404";
            }
        }
    }
}
