<?php

const EUR_COURSE = 0.94;
const UAH_COURSE = 29.55;

$currency = [
    ["name" => "usd"],
    ["name" => "eur"],
    ["name" => "uah"],
];

$course = $_POST["currentCourse"] ?? "usd";

$currencySign = function () use ($course) {
    if ($course === 'usd') {
        return '$';
    } else if ($course === 'eur') {
        return '&#8364;';
    } else if ($course === 'uah') {
        return '&#8372;';
    } else {
        return '';
    }
};

$swichCurrencyValue = function ($value) use ($course) {
    switch ($course) {
        case 'eur':
            return $value * EUR_COURSE;
            break;

        case 'uah':
            return $value * UAH_COURSE;
            break;

        case 'usd':
            return $value;
            break;

        default:
            break;
    }
};