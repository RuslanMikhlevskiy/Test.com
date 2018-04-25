<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Форма отправки</title>
	</head>
	
<body>

   <div align="center">
        <form action="signup.php" method="POST">
            <input name="firstName" type="text" value="" placeholder="Имя" ><br>

            <input name="lastName" type="text" value="" placeholder="Фамилия" ><br>

            <input name="age" type="number" value="" placeholder="Возраст" ><br>

            <p><input name="sex" type="radio" value="female" placeholder="Пол" >female
                <input name="sex" type="radio" value="male" placeholder="Пол" >male</p>
                

            <p><input name="smokes" type="radio" value="yes" placeholder="Курение" >yes
                <input name="smokes" type="radio" value="no" placeholder="Курение" >no</p>

            <p><input name="orientation" type="radio" value="straight" placeholder="Ориентация" >straight
                <input name="orientation" type="radio" value="homo" placeholder="Ориентация" >homo</p>

            <p><input name="education" type="radio" value="school" placeholder="Образование" >school
                <input name="education" type="radio" value="college" placeholder="Образование" >college</p>

            <input name="salary" type="number" value="$" placeholder="Зарплата" ><br>

            <input type="submit" placeholder="Отправить">
        </form>
    </div>

 <?php 
function chckBx($v){
    $t = filter_input(INPUT_POST, $v, FILTER_VALIDATE_BOOLEAN);
    if ($t == TRUE) return 1;
    else return 0;
}

$search_data["gender"] = $_POST['gender'];
$search_data["age"] = chckBx('age');
$search_data["min_age"] = $_POST['min_age'];
$search_data["max_age"] = $_POST['max_age'];
$search_data["salary"] = chckBx('salary');
$search_data["min_sal"] = $_POST['min_sal'];
$search_data["max_sal"] = $_POST['max_sal'];
$search_data["smokes"] = chckBx('smokes');
$search_data["smokes_opt"] = $_POST['smokes_opt'];
echo '<br>$search_data: '; print_r ($search_data);

$ageCheck = ''; // результат проверки на возраст
$salaryCheck = ''; // проверка на зарплату

$userInfo  = array ("firstName" => "John",
                       "lastName" => "Dou",
                        "age" => 25,
                        "sex" => "male",
                        "smokes" => 1,
                        "salary" => 1000);
echo '<br>$userInfo: ';print_r ($userInfo);

function check_person_compliance($sD, $uI) {
global $ageCheck;
    if ($sD["age"] == 1){
       if ($uI['age'] <= $sD['max_age'] && $uI['age'] >= $sD['min_age']) {
            $ageCheck = 'true';
        } else {
            $ageCheck = 'false';
        }
    }
}

check_person_compliance ($search_data, $userInfo);

echo '<br>$ageCheck: '.$ageCheck;
?>

<div align="center">
    <h1>Поиск пользователя по параметрам</h1>
    <form method ="POST">
        <h1>Выберите пол</h1>

        <label for="femaleId">female</label>
        <input type="radio" name="gender" value="female" id="femaleId">

        <label for="maleId">male</label>
        <input type="radio" name="gender" value="male" id="maleId">
<hr>
        <label for="ageId">Выберите возраст</label>
        <input name="age" type="checkbox" id="ageId">
<br>
        <label for="minAId">От</label>
        <input name="min_age" type="number" min="18" max="40" value="18" id="minAId">
        <label for="maxAId">До</label>
        <input name="max_age" type="number" min="18" max="40" value="40" id="maxAId">
<hr>
        <label for="salayId">Доход в месяц</label>
        <input name="salary" type="checkbox" id="salayId">
<br>    
        <label for="minSId">От</label>
        <input name ="min_sal" type="number" min="0" max="100500" value="0" id="minSId">
        <label for="maxSId">До</label>
        <input name ="max_sal" type="number" min="0" max="100500" value="100500" id="maxSId">
<hr>
        <label for="smokesId">Курение</label>
        <input name="smokes" type="checkbox" id="smokesId">
<br>
        <label for="smokeYesId">yes</label>
        <input name="smokes_opt" type="radio" value="yes" id="smokeYesId">
        <label for="smokeNoId">no</label>
        <input name="smokes_opt" type="radio" value="no" id="smokeNoId">
<hr>
        <button type="submit">Поиск</button>
    </form>  
</div>



</html>
