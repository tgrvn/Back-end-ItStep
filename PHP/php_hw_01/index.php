<?php

// 1, 2
$name = "*anyName*";
$age = "24";

echo "<pre>";
echo "Hello! My name is " . $name . "\n" . "I'm Age " . $age . "\n";
echo "</pre>";

// 3, 4
$a = 5;
$b = 7;
$rez = $a + $b;
$a = $a + $b - ($b = $a);

echo $a . "+" . $b . "=" . $rez;

// 5
$testArr = [
    [
        "type" => "radio",
        "question" => "Here must be any question n one right answer??",
        "answers" => [
            ["name" => "not right answer", "is_true" => false],
            ["name" => "not right answer", "is_true" => false],
            ["name" => "right answer", "is_true" => true],
            ["name" => "not right answer", "is_true" => false],
        ]
    ],
    [
        "type" => "checkbox",
        "question" => "Here must be any question n couple right answer??",
        "answers" => [
            ["name" => "right answer", "is_true" => true],
            ["name" => "not right answer", "is_true" => false],
            ["name" => "right answer", "is_true" => true],
            ["name" => "not right answer", "is_true" => false],
        ]
    ],
    [
        "type" => "textarea",
        "question" => "Here must be any question n detalied answer??",
        "answers" => ["name" => "that a right answer", "is_true" => true]
    ],
];

foreach ($testArr as $question) {
    $type = $question["type"];
    $question_name = $question["question"];
    $answers = $question["answers"];

    echo "<div style='padding:12px'>";
    echo "<p>$question_name</p>";

    if ($type === "radio" || $type === "checkbox") {
        foreach ($answers as $answer) {
            echo "<input type='$type' name='$type'/>";
            echo "<label>$answer[name]</label>" . "</br>";
        }
    } else if ($type === "textarea") {
        echo "<textarea></textarea>";
    }
    echo "</div>";
}

// 6
$background_color = "blue";
$color = "red";
$width = "100px";
$height = "100px";

$tag = "<div style=\"background-color:$background_color; color:$color; width:$width; height:$height\">Hello</div>";
?>

<?= $tag ?>