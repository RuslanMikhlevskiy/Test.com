<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?php include 'html/common_libs.inc.html'; ?>
	</head>
	
<body>

<?php include 'html/menu.inc.html'; ?>

<?php

switch ($_REQUEST['page']) {
    case 'signup':
        require_once $_SERVER['DOCUMENT_ROOT'].'/pages/signup.inc.php';
        break;

    case 'search':
        require_once $_SERVER['DOCUMENT_ROOT'].'/pages/search.inc.php';
        break;

    default:
        require_once $_SERVER['DOCUMENT_ROOT'].'/pages/unknown.inc.php';
}

?>

</body>



</html>
