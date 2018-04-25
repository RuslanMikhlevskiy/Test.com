<?php 

$search_data = array ();
$search_data["gender"] = $_POST['gender'];
$search_data["age"] = $_POST['age'];
$search_data["min_age"] = $_POST['min_age'];
$search_data["max_age"] = $_POST['max_age'];
$search_data["salary"] = $_POST['salary'];
$search_data["min_sal"] = $_POST['min_sal'];
$search_data["max_sal"] = $_POST['max_sal'];
$search_data["smokes"] = $_POST['smokes'];
$search_data["smokes_opt"] = $_POST['smokes_opt'];



function check_person_compliance(array $search_data, array $userInfo): bool {
 if (isset($search_data['age']) && $userInfo['age'] <= $search_data['max_age'] && $userInfo['age'] >= $search_data['min_age']) {
	    	return true;
	    } else {
	        return false;	
	    }
}
	$userInfo  = array ("firstName" => "John",
                       "lastName" => "Dou",
                        "age" => 25,
                        "sex" => "male",
                        "smokes" => "true",
                        "salary" => 1000);

var_dump(check_person_compliance($search_data, $userInfo));

?>
