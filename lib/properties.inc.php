<?php

/*
  This small library provide a set of functions
  to read/write java-like properties files.
*/

declare(strict_types=1);

// Builds a properties representation from the give associative array.
function array_to_properties_text(array $arr):string{
    $text = "";
    foreach ($arr as $property => $value) {
        $text = $text . ( $property . "=" . $value . "\n");
    }   
    return $text;
}

?>
