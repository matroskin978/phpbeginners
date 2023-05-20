<?php

var_dump($file);
$a = 123;
function test()
{
    global $a;
    var_dump($a);
    require 'file2.php';
}

test();
