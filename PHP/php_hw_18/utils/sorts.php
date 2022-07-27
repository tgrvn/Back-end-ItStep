<?php

function array_sort($array, $on, $order = SORT_ASC, $country = false, $make = false, $min = false, $max = false)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    if (!!$country) {
        $new_array = array_filter($new_array, function ($item) {
            return $item["country"] == $_GET["country"];
        });
    }

    if (!!$make) {
        $new_array = array_filter($new_array, function ($item) {
            return $item["make"] == $_GET["make"];
        });
    }

    if (!!$min) {
        $new_array = array_filter($new_array, function ($item) {
            return (int)$item["price"] > (int)$_GET["min"];
        });
    }

    if (!!$max) {
        $new_array = array_filter($new_array, function ($item) {
            return (int)$item["price"] < (int)$_GET["max"];
        });
    }

    return $new_array;
}
