<?php

// Complete the minimumSwaps function below.
function minimumSwaps($arr) {
    $swaps = 0;

    //make array start from 1
    array_unshift($arr, $arr[0]);
    unset($arr[0]);

    //flip the array
    $flippedArr = array_flip($arr);

    foreach($arr as $key => $value) {
        $x = $arr[$key];

        if ($x != $key) {
            $y = $flippedArr[$key];
            $arr[$y] = $x;
            $flippedArr[$x] = $y;
            $swaps+= 1;
        }
    }

    return $swaps;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$res = minimumSwaps($arr);

fwrite($fptr, $res . "\n");

fclose($stdin);
fclose($fptr);