<?php

// Complete the maximumToys function below.
function maximumToys($prices, $k) {
    $toys = 0;
    sort($prices, SORT_NUMERIC);

    foreach($prices as $price) {
        if ($price <= $k) {
            $toys += 1;
            $k = $k - $price;
        } else {
            break;
        }
    }

    return $toys;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nk_temp);
$nk = explode(' ', $nk_temp);

$n = intval($nk[0]);

$k = intval($nk[1]);

fscanf($stdin, "%[^\n]", $prices_temp);

$prices = array_map('intval', preg_split('/ /', $prices_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = maximumToys($prices, $k);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
