<?php

function write_person($userInfo):string{

    $text = "";
      foreach ($userInfo as $property => $value) {
        $text = $text . ( $property . "=" . $value . "\n");
    }   
        return $text;
}

$text = write_person($userInfo);

function construct_file_name($userInfo):string {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $fileName = ($_POST['firstName'] . "_" . $_POST['lastName']) .".properties";
    return $fileName;
} 

$fileName = construct_file_name($userInfo);

function write_to_file($fileName, $text){
    $dir = './persons';
    if (!is_dir($dir)) {
        print_r("False");
        mkdir('./persons', 0777);
        $fp = fopen($dir.'/'.$fileName, 'w');
        fwrite($fp, $text);
        fclose($fp);
    }else{
        print_r("True");
        $fp = fopen($dir.'/'.$fileName, 'w');
        fwrite($fp, $text);
        fclose($fp);
    }   
}       
write_to_file($fileName, $text);

?>