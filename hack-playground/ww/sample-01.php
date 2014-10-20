<?php

/*

1) run as php
2) convert to hack
3) run as hack

*/

function add($a, $b) {
    return $a + $b;
}

function test() {
    $a = 'hello';
    $b = 2;

    $r = add($a, $b);
    $s = (string) $r;

    echo $s;
    echo PHP_EOL;
}

test();
