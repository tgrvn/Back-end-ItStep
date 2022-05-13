<?php

// 1 a, b
$user_amount = 20;
$counter = 0;
$average = 0;

function setNumericArray(int $amount): array
{
    $numeric_arr = [];

    for ($i = 1; $i < $amount; $i++) {
        if ($i % 2 !== 0) {
            array_push($numeric_arr, $i);
        }
    }

    return $numeric_arr;
}

function printValues(int $user_amount, string $params, int &$counter, int &$average)
{
    $values_array_normal = setNumericArray($user_amount);
    $values_array_reversed = array_reverse($values_array_normal);
    $max_value = $values_array_reversed[0];
    $counter = 0;
    $average = 0;

    if ($params === 'normal') {
        foreach ($values_array_normal as $number) {
            echo "<span style='color:red; font-size:$max_value'>$number, </span>";

            $counter++;
            $average += $number;
        }
    } else if ($params === 'reverse') {
        foreach ($values_array_reversed as $number) {
            echo "<span style='color:red; font-size:$max_value'>$number, </span>";

            $counter++;
            $average += $number;
        }
    }
}

// 2
$numb_arr = [1234, 2321, 1221, 2345, 1221];

// c
function getPalindorms(array $arr): int
{
    $counter = 0;

    foreach ($arr as $number) {

        $str_number_reversed = strrev((string) $number);

        if ($str_number_reversed == $number) {
            $counter++;
        }
    }

    return $counter;
}

$palindrome_amount = getPalindorms($numb_arr);

// d, e
function getEventOrOdd(array $arr, string $params): int
{
    $values_str = implode("", $arr);
    $counter = 0;

    for ($i = 0; $i < strlen($values_str); $i++) {

        if ($params === 'even' && $values_str[$i] % 2 === 0) {
            $counter++;
        } else if ($params === 'odd' && $values_str[$i] % 2 !== 0) {
            $counter++;
        }
    }

    return $counter;
}

$even_values = getEventOrOdd($numb_arr, 'even');
$odd_values = getEventOrOdd($numb_arr, 'odd');

// f
// function getOrdered(array $arr){

// }

?>

<div>
    <?= printValues($user_amount, 'normal', $counter, $average) ?>
    </br>
    <?= "AVG: " . $average / $counter ?>
    </br>
    <?= printValues($user_amount, 'reverse', $counter, $average) ?>
</div>

</br>

<div>
    <?= "Mirrored numbers: " . $palindrome_amount ?>
    <br>
    <?= "Even numbers: " . $even_values ?>
    <br>
    <?= "Odd numbers: " . $odd_values ?>
</div>