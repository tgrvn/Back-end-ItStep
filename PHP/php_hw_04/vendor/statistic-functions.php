<?php

$summaryPrice = 0;
$summaryAmount = 0;

$summaryCitrus = 0;
$summaryGrass = 0;
$summaryFetus = 0;
$summaryBerry = 0;

$summaryCitrusCount = 0;
$summaryGrassCount = 0;
$summaryFetusCount = 0;
$summaryBerryCount = 0;

foreach ($fruits as $fruit) {
    $fruit['price'] = $swichCurrencyValue($fruit['price']);
    $summaryPrice += $fruit['price'];
    $summaryAmount += $fruit['count'];

    switch ($fruit['type']) {
        case 'citrus':
            $summaryCitrus += $fruit['price'];
            $summaryCitrusCount += $fruit['count'];
            break;

        case 'grass':
            $summaryGrass += $fruit['price'];
            $summaryGrassCount += $fruit['count'];
            break;

        case 'fetus':
            $summaryFetus += $fruit['price'];
            $summaryFetusCount += $fruit['count'];
            break;

        case 'berry':
            $summaryBerry += $fruit['price'];
            $summaryBerryCount += $fruit['count'];
            break;

        default:
            break;
    }
}

$statCard = [
    ['head' => 'summary price all', 'value' => number_format(($summaryPrice / count($fruits)), 2, ',')],
    ['head' => 'summary amount all', 'value' => $summaryAmount],
    ['head' => 'summary citrus price', 'value' => number_format(($summaryCitrus / count($fruits)), 2, ',')],
    ['head' => 'summary grass price', 'value' => number_format(($summaryGrass / count($fruits)), 2, ',')],
    ['head' => 'summary fetus price', 'value' => number_format(($summaryFetus / count($fruits)), 2, ',')],
    ['head' => 'summary berries price', 'value' => number_format(($summaryBerry / count($fruits)), 2, ',')],
    ['head' => 'summary amount citrus', 'value' => $summaryCitrusCount],
    ['head' => 'summary amount grass', 'value' => $summaryGrassCount],
    ['head' => 'summary amount fetus', 'value' => $summaryFetusCount],
    ['head' => 'summary amount berry', 'value' => $summaryBerryCount],
];
