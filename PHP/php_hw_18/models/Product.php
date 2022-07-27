<?php

namespace models;

use PDO;

class Product
{
    private $db;

    public function __construct()
    {
        $config = include_once "./config/db.php";

        $this->db = new PDO(
            $config["connection"],
            $config["user"],
            $config["password"]
        );
    }

    public function getSectors()
    {
        return $this->db->query("SELECT s.name from sector as s")->fetchAll();
    }

    public function getCategories($sector)
    {
        return $this->db->query(
            "SELECT c.name
            FROM cart as ca
            JOIN product as p on p.id = ca.pdouctId
            JOIN category as c on c.id = p.idCategory
            JOIN sector as s on s.sector_id = c.idSector
            WHERE s.name = '$sector'
            GROUP BY c.name"
        )->fetchAll();
    }

    public function getAllProducts($mss)
    {
        $sortType = $mss["sort"] ?? "name";
        $sortOrder = $mss["order"] ?? "asc";
        $category = $mss["category"] ?? "";
        $country = $mss["country"] ?? "";
        $make = $mss["make"] ?? "";
        $min = $mss["min"] ?? "";
        $max = $mss["max"] ?? "";

        $products = $this->db->query(
            "SELECT p.*
            FROM product as p
            JOIN category as c on c.id = p.idCategory
            WHERE c.name = '$category'
            GROUP BY p.id"
        )->fetchAll();

        return array_sort($products, $sortType, $sortOrder == "asc" ? SORT_ASC : SORT_DESC, $country, $make, $min, $max);
    }
}
