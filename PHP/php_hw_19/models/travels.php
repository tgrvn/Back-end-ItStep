<?php

class Travels
{
    protected $db;

    public function __construct()
    {
        $config = include_once "./config/db.php";

        $this->db = new \PDO(
            $config["connection"],
            $config["user"],
            $config["password"]
        );
    }

    public function getAllCountries()
    {
        return $this->db->query("SELECT * from countries")->fetchAll();
    }

    public function getHotels($country = false)
    {
        if (!!$country) {
            return $this->db->query("SELECT * from hotels as h JOIN countries as c on h.id_country = c.id WHERE c.country = '$country'")->fetchAll();
        }

        return $this->db->query("SELECT * from hotels")->fetchAll();
    }

    public function getCountryById($id)
    {
        return $this->db->query("SELECT c.country from countries as c where c.id = '$id'")->fetch();
    }

    public function getCityById($id)
    {
        return $this->db->query("SELECT c.city from cities as c where c.id = '$id'")->fetch();
    }

    public function getImgById($id)
    {
        return $this->db->query("SELECT `imgpath` from images as i where i.id_hotel = '$id'")->fetch();
    }
}