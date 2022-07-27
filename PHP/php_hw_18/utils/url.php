<?php

function getUrl($controller, $action = "index", $params = [], $sortMode = false, $sortType = "", $sortOrder = "")
{
    $paramsTxt = "";

    foreach ($params as $keyParam => $value) {
        $paramsTxt .= "&$keyParam=$value";
    }

    if ($sortMode) {
        $url = "?controller=$controller&action=$action&sort=$sortType&order=$sortOrder$paramsTxt";

        return $url;
    }

    $url = "?controller=$controller&action=$action$paramsTxt";

    return $url;
}
