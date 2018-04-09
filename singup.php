<?php


$userInfo = array();
$userInfo["firstName"] = $_POST['firstName'];
$userInfo["lastName"] = $_POST['lastName'];
$userInfo["age"] = $_POST['age'];
$userInfo["sex"] = $_POST['sex'];
$userInfo["smokes"] = $_POST['smokes'];
$userInfo["orientation"] = $_POST['orientation'];
$userInfo["education"] = $_POST['education'];
$userInfo["salary"] = $_POST['salary'];

function add_person($userInfo) {
    $text = "";
    foreach ($userInfo as $property => $value) {
        $text = $text . ( $property . "=" . $value . "\n");
    }
   	$firstName = $_POST['firstName'];
   	$lastName = $_POST['lastName'];
   	$dir = '/domains/test.com/persons';
   	$fileName = ($_POST['firstName'] . "_" . $_POST['lastName']) .".properties";
   	if (!is_dir($dir)) {
   		print_r("False");
     	mkdir('/domains/test.com/persons', 0777);
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


add_person($userInfo); 

?>