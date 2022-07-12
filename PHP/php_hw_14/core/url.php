<?php

function getUrl($controller = "default", $action = "login", $params = [])
{
    $paramTxt = "";

    foreach ($params as $pKey => $pValue) {
        $paramTxt .= "&$pKey=$pValue";
    }

    $url = "?controller=$controller&action=$action$paramTxt";

    return $url;
}