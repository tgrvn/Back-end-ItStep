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
$numb_arr = [4321, 7342, 2332, 9853, 6556];

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
function getOrdered(array $arr)
{

    foreach ($arr as $number) {
        $str_value = (string)$number;
        $counter = 0;
        $flag = false;

        for ($i = 0; $i < strlen($str_value); $i++) {
            $max = $str_value[0];

            if ($max > $str_value[$i]) {
                $flag = true;
            }

            if ($flag) {
                $flag = false;
                $counter++;
            }
        }
    }

    return $counter;
}

$ordered_values = getOrdered($numb_arr);

// 3
function printCircle()
{
    for ($i = 1; $i <= 10; $i++) {
        echo "<div class='circle'></div>";
    }
}

// 4
function convertBinary(int $number)
{
    return bindec($number);
}

$user_value = 110110;
$converted = convertBinary($user_value);

// 5
$value = 22;

function numberToRoman(int $number)
{
    $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if ($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}

// 6
$day_amount = 30;

function printCalendar(int $day_amount)
{
    $count = 0;

    for ($i = 1; $i <= $day_amount; $i++) {
        $count++;

        if ($i % 7 === 0 || $i % 7 === 6) {
            echo "<td class='weekend'>$i</td>";
        } else {
            echo "<td class='normal'>$i</td>";
        }

        if ($count === 0) {
            echo "<tr>";
        } else if ($count === 7) {
            $count = 0;
            echo "</tr>";
        }
    }
}

// 7
function printImage()
{

    for ($i = 0; $i <= 10; $i++) {

        if ($i > 0) {
            echo "<img src='./img/img$i.jpg'>";
        }

        if ($i === 5 || $i === 10) {
            echo "</div>";
        }

        if ($i === 0 || $i === 5) {
            echo "<div class='clearfix'>";
        }
    }
}

?>

<style>
    .circle {
        float: left;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: blue;
    }

    .clearfix {
        overflow: auto;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    .normal:hover {
        background-color: black;
        color: #fff;
    }

    .weekend {
        color: red;
    }

    .images {
        margin: 0 auto;
        width: max-content;
        padding: 20px;
    }

    img {
        float: left;
        width: 200px;
        height: 150px;
        object-fit: cover;
    }
</style>

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
    <br>
    <?= "Ordered numbers: " . $ordered_values ?>
</div>

</br>

<div class="clearfix">
    <?= printCircle() ?>
</div>

</br>

<div>
    <p>Number: <?= $user_value ?></p>
    <p>Converted: <?= $converted ?></p>
</div>

<br>

<div>
    <p>Number: <?= $value ?></p>
    <p>Roman: <?= numberToRoman($value) ?></p>
</div>

<table>
    <tbody>
        <?= printCalendar($day_amount) ?>
    </tbody>
</table>

<div class="images">
    <?= printImage() ?>
</div>