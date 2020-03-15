<?php
// phpinfo();
fizzbuzz();
function fizzbuzz() {
    for ($i=1; $i<20; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            print("fizzbuzz\n");
        } elseif ($i % 3 == 0) {
            print("fizz\n");
        } elseif ($i % 5 == 0) {
            print("buzz\n");
        } else {
            print($i . "\n");
        }
    }
}
