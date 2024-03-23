<?php
/*
*   Create logic to print the numbers 1 to 100, with following conditions:
*   
*/

$outputArr = [];

for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 === 0 && $i % 5 === 0) {
        array_push($outputArr, "foobar");
    } else if ($i % 3 === 0 && $i % 5 !== 0) {
        array_push($outputArr, "foo");
    } else if ($i % 3 !== 0 && $i % 5 === 0) {
        array_push($outputArr, "bar");
    } else {
        array_push($outputArr, $i);
    }
}
echo implode(", ", $outputArr);

?>