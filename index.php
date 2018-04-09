<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Форма отправки</title>
	</head>
	
<body>

   <div align="center">
    <h1> Заполните данные</h1>
    <h2> Тестируем Гит</h2>
        <form action="singup.php" method="POST">
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

</body>


</html>
