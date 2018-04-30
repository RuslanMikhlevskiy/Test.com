<div class="container">

  <h1>Search persons</h1>

  <form action="/?page=search" method="POST" >
    <div class="form-group">
      <label for="inputGender">Gender</label>
        <select id="inputGender" name="gender" class="form-control">
          <option selected>Male</option>
          <option>Female</option>
        </select>
    </div>

    <div class="form-row">
      <div class="form-group col-md-2">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="ageFilter" id="filterByAgeInput">
          <label class="form-check-label" for="filterByAgeInput">
            Filter by age
          </label>
        </div>
      </div>
      <div class="form-group col-md-5">
        <label for="inputLowerAge">Lower age</label>
        <input type="number" class="form-control" name="lowerAge" id="inputLowerAge" value="18" >
      </div>
      <div class="form-group col-md-5">
        <label for="inputHigherAge">Higher age</label>
        <input type="number" class="form-control" name="higherAge" id="inputHigherAge" value="90" >
      </div>
    </div>

      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>

  </form>

</div>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/person_storage.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/person_filter.inc.php';

    // Создаем фильтрующий критерий
    $filter = array(
        "gender" => $_POST['gender'],
        "ageFilter" => isset($_POST['ageFilter']),
        "lowerAge" => $_POST['lowerAge'],
        "higherAge" => $_POST['higherAge']
    );

    // Вычитываем последовательно каждого пёрсена из файла,
    // и проверяем подходит ли он под указанный фильтрующий критерий
    $result = array();
    foreach(all_person_files() as $personFile) {
        $userInfo = read_from_file($personFile);
        if (match_person($userInfo, $filter)) {
            $result[]=$userInfo;
        }
    }
    
    // Отображение результата
    ?>
        <table class="table">
            <tr>
                <th scope="col">First name</td>
                <th scope="col">Last name</td>
                <th scope="col">Gender</td>
                <th scope="col">Age</td>
                <th scope="col">Orientation</td>
                <th scope="col">Smokes</td>
                <th scope="col">Education</td>
                <th scope="col">Salary</td>
            </tr>
    <?php
    foreach($result as $res) {
        echo "<tr>";
        echo "<td>" . $res['firstName'] . "</td>";
        echo "<td>" . $res['lastName'] . "</td>";
        echo "<td>" . $res['sex'] . "</td>";
        echo "<td>" . $res['age'] . "</td>";
        echo "<td>" . $res['orientation'] . "</td>";
        echo "<td>" . $res['smoke'] . "</td>";
        echo "<td>" . $res['education'] . "</td>";
        echo "<td>" . $res['salary'] . "</td>";
        echo "</tr>";
    }
    ?></table><?php
}

?>
