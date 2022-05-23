<?php

$sortType = "name";
$sortOrder = "asc";
$category = "all";
$fruitName = "";
$priceFrom = "";
$priceTo = INF;
$count = 0;

if (count($_GET) > 0) {
    if (isset($_GET["sortType"]) && !empty($_GET["sortType"])) {
        $sortType = $_GET["sortType"];
    }

    if (isset($_GET["sortOrder"]) && !empty($_GET["sortOrder"])) {
        $sortOrder = $_GET["sortOrder"];
    }

    if (isset($_GET["filteredFruits"]) && !empty($_GET["filteredFruits"])) {
        $category = $_GET["filteredFruits"];
    }

    if (isset($_GET["byName"]) && !empty($_GET["byName"])) {
        $fruitName = $_GET["byName"];
    }

    if (isset($_GET["priceFrom"]) && !empty($_GET["priceFrom"])) {
        $priceFrom = $_GET["priceFrom"];
    }

    if (isset($_GET["priceTo"]) && !empty($_GET["priceTo"])) {
        $priceTo = $_GET["priceTo"];
    }

    if (isset($_GET["count"]) && !empty($_GET["count"])) {
        $count = $_GET["count"];
    }
}

$sortAscFunction = function ($a, $b) use ($sortType, $sortOrder) {
    $valueA = $a[$sortType];
    $valueB = $b[$sortType];
    $type = gettype($a[$sortType]);

    if ($valueA === $valueB) {
        return 0;
    }

    if ($type === "string") {
        return strcmp($valueA, $valueB);
    } else if ($type === "integer") {
        return $valueA - $valueB;
    }
};

$sortDescFunction = function ($a, $b) use ($sortType, $sortOrder) {
    $valueA = $a[$sortType];
    $valueB = $b[$sortType];
    $type = gettype($a[$sortType]);

    if ($valueA === $valueB) {
        return 0;
    }

    if ($type === "string" && $sortOrder === "desc") {
        return strcmp($valueB, $valueA);
    } else if ($type === "integer" && $sortOrder === "desc") {
        return $valueB - $valueA;
    }
};

function setOrder($sortOrder)
{
    return $sortOrder === 'asc' ? 'desc' : 'asc';
};

$isSelect = function ($selectedCategory) use ($category) {
    if ($category === $selectedCategory) {
        return true;
    }

    return false;
};

$categoryFilter = function ($fruit) use ($category) {
    if ($fruit["type"] === $category || $category === "all") {
        return true;
    }
    return false;
};

$nameFilter = function ($fruit) use ($fruitName) {
    $pos = strpos($fruit["name"], $fruitName);

    if ($pos !== -1 && $pos !== false) {
        return true;
    }

    return false;
};

$priceFilter = function ($fruit) use ($priceFrom, $priceTo) {
    if ($fruit["price"] >= $priceFrom && $fruit["price"] <= $priceTo) {
        return true;
    }

    return false;
};

$filterFruits = function ($arr) use ($categoryFilter, $fruitName, $nameFilter, $priceTo, $priceFrom, $priceFilter) {

    $arrCopy = array_filter($arr, $categoryFilter);

    if (!empty($fruitName)) {
        $arrCopy = array_filter($arrCopy, $nameFilter);
    }

    if (!empty($priceTo) || !empty($priceFrom)) {
        $arrCopy = array_filter($arrCopy, $priceFilter);
    }

    return $arrCopy;
};
