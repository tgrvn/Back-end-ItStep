<?php

class Travels
{
    protected $db;

    public function __construct()
    {

        $this->db = new \PDO(
            "mysql:host=localhost;dbname=travels",
            "root",
            ""
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

    public function setNewUser($login, $pass, $email)
    {
        $this->db->query("INSERT INTO `users`(`login`, `password`, `email`, `id_role`, `discount`) VALUES ('$login','$pass','$email', 1, 0)");
    }

    public function isSetUser($log, $email)
    {
        return $this->db->query("SELECT * from users as u where u.email = '$email' or u.login = '$log'")->fetchAll();
    }

    public function getUserByData($log, $pass)
    {
        return $this->db->query("SELECT u.id, u.login, u.email, u.id_role, u.discount, u.avatar from users as u where u.email = '$log' or u.login = '$log' and u.password = '$pass'")->fetch();
    }

    public function setComment($text, $idHotel, $userId)
    {
        return $this->db->query("INSERT INTO `comments`(`id_hotel`, `id_user`, `comment`) VALUES ('$idHotel','$userId','$text')");
    }

    public function getComments($hotelId)
    {
        return $this->db->query("SELECT * from comments as c join users as u on u.id = c.id_user where c.id_hotel = '$hotelId'")->fetchAll();
    }

    public function delComment($hotelId, $userId, $commentId)
    {
        return $this->db->query("DELETE FROM comments WHERE comments.id_user = '$userId' and comments.id_hotel = '$hotelId' and comments.id = '$commentId'");
    }
}
