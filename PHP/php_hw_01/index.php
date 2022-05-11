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
$rightAnswer = "<p style=\"background-color:green;\"><input type=\"radio\" name=\"question\">Answer 3</p>";

// 6
$background_color = "blue";
$color = "red";
$width = "100px";
$height = "100px";

$tag = "<div style=\"background-color:$background_color; color:$color; width:$width; height:$height\">Hello</div>";
?>

<?= $tag ?>
<div class="quests" style="width:50%;">
    <p>Question??</p>
    <p><input type="radio" name="question">Answer 1</p>
    <p><input type="radio" name="question">Answer 2</p>
    <?= $rightAnswer ?>
    <p><input type="radio" name="question">Answer 4</p>
</div>