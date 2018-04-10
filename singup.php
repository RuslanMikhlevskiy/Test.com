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

include 'lib/properties.inc.php';

?>