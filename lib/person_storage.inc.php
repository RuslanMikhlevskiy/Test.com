<?php

/*
  These function prove an abstraction of properties file-based storage
  for user information that is represented as associative array.
  Each array holds an information about a user and cosist of such
  properties like "firstName", "lastName", "age", etc.
*/

declare(strict_types=1);

require_once "properties.inc.php";

// Construct name for a properties file, that will be used to store the user info
function construct_file_name(array $userInfo): string {
    $firstName = $_POST['firstName'] or die("User info has no first name");
    $lastName = $_POST['lastName'] or die("User info has no last name");
    $fileName = $firstName . "_" . $lastName .".properties";

    return $fileName;
} 

// Writes test to a file
function write_to_file(string $fileName, string $text){
    $dir = './persons';

    if (!is_dir($dir)) {
        mkdir('./persons', 0777);
    }
    $fp = fopen($dir . '/' . $fileName, 'w');
    fwrite($fp, $text);
    fclose($fp);
}

?>
