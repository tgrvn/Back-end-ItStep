<?php

const EUR_COURSE = 0.94;
const UAH_COURSE = 29.55;
const USD = "usd";
const EUR = "eur";
const UAH = "uah";

$currency = [
    ["name" => "usd"],
    ["name" => "eur"],
    ["name" => "uah"],
];

$course = $_POST["currentCourse"] ?? "usd";

$currencySign = function () use ($course) {
    if ($course === USD) {
        return '$';
    } else if ($course === EUR) {
        return '&#8364;';
    } else if ($course === UAH) {
        return '&#8372;';
    } else {
        return '';
    }
};

$swichCurrencyValue = function ($value) use ($course) {
    switch ($course) {
        case EUR:
            return $value * EUR_COURSE;
            break;

        case UAH:
            return $value * UAH_COURSE;
            break;

        case USD:
            return $value;
            break;

        default:
            break;
    }
};
