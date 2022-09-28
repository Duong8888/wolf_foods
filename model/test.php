<?php

$tests = array(
    "42",
    1337,
    0x539,
    02471,
    0b10100111001,
    1337e0,
    "not numeric",
    9.1
);
 
foreach ($tests as $element) {
    if (!is_numeric($element)) {
        echo "'{$element}' is numeric <br />" ;
    } else {
        echo "'{$element}' is NOT numeric <br />";
    }
}
?>