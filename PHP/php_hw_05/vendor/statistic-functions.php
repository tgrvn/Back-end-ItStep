<?php

$types = array_unique(array_column($fruits, 'type'));

$getFruitStat = function () use ($types, $fruits) {
    $newArr = [];

    foreach ($types as $type) {
        $priceAll = 0;
        $countAll = 0;
        $counter = 0;

        foreach ($fruits as $fruit) {

            if ($fruit['type'] === $type) {
                $counter++;
                $priceAll += $fruit['price'];
                $countAll += $fruit['count'];
            }
        }

        if ($priceAll > 0) {
            array_push($newArr, ["type" => $type, "all-price" => $priceAll, "summary-count" => number_format($countAll / $counter, 2, ',')]);

            $priceAll = 0;
            $counter = 0;
        }
    }

    return $newArr;
};

$getSummaryCount = function ($params) use ($fruits) {
    $priceAll = 0;
    $summary = 0;
    $counter = 0;

    foreach ($fruits as $fruit) {
        $summary += $fruit['count'];
        $priceAll += $fruit['price'];
        $counter++;
    }

    if ($params === 'price') {
        return number_format($priceAll / $counter, 2, ',');
    } else if ($params === 'count') {
        return number_format($summary / $counter, 2, ',');
    }
};
