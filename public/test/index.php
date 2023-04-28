<?php

// require_once 'app/A.php';
// require_once 'classes/A.php';


/* spl_autoload_register(function ($class) {
    // var_dump($class);
    $filename = str_replace('\\', DIRECTORY_SEPARATOR, $class) . ".php";
    // var_dump($filename);
    require_once $filename;
    // var_dump("app/{$class}.php");
}); */

require __DIR__ . '/vendor/autoload.php';

test();


new app\A;
new base\A();
new base\B();
