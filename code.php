<?php
fscanf(STDIN, "%d", $n);

$inputs = explode(" ", fgets(STDIN));

if ($n == 0 || is_null($n) || is_null($inputs) || empty($inputs)) {
    echo("0\n");
    return;
}

function mapToInt($toNumber)
{
    return intval($toNumber);
}

$positiveTemps = array_filter($inputs, function($value) {
    return $value > 0;
});
$positiveTemps = array_map('mapToInt', $positiveTemps);

$negativeTemps = array_filter($inputs, function($value) {
    return $value < 0;
});
$negativeTemps = array_map('mapToInt', $negativeTemps);

$closestNegative = 0;
$closestPositive = 0;

if (!empty($positiveTemps)) {
    $closestPositive = min($positiveTemps);
}
if (!empty($negativeTemps)) {
    $closestNegative = max($negativeTemps);
}
//error_log(var_export($closestNegative));

if (empty($closestNegative) || abs($closestNegative) == $closestPositive) {
    echo($closestPositive);
} elseif (empty($closestPositive) || abs($closestNegative) < $closestPositive) {
    echo($closestNegative);
} else {
    echo($closestPositive);
}
?>
