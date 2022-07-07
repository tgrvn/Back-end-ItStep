<?php

class JSON
{
    private static $_path = "./store/products.json";

    static function getJSON()
    {
        $strJSON = file_get_contents(static::$_path);

        if (!file_exists(static::$_path)) {
            $strJSON = file_get_contents(static::$_path);
        }

        return json_decode($strJSON, true);
    }

    static function setJSON($mss)
    {
        $jsonData = static::getJSON(static::$_path);
        if (count($mss) > 0) {
            $jsonData[] = $mss;
            $strJSON = json_encode($jsonData);
            file_put_contents(static::$_path, $strJSON);
        }
    }
}
