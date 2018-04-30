<div class="container">

  <h1>Person registration</h1>

  <form action="/?page=signup" method="POST" >

    <div class="form-group row">
      <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
      </div>
    </div>

    <div class="form-group row">
      <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
      </div>
    </div>

    <div class="form-group row">
      <label for="age" class="col-sm-2 col-form-label">Age</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="age" id="age" value="18" >
      </div>
    </div>

    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Sex</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" id="sexRadios1" value="female" checked>
            <label class="form-check-label" for="sexRadios1">
              Female
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" id="sexRadios2" value="male">
            <label class="form-check-label" for="sexRadios2">
              Male
            </label>
          </div>
        </div>
      </div>
    </fieldset>

    <div class="form-group row">
      <div class="col-sm-2">Smoke</div>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" name="smoke" type="checkbox" id="smokeCheck1">
          <label class="form-check-label" for="smokeCheck1">
            yes/no
          </label>
        </div>
      </div>
    </div>

    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Sexual orientation</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="orientation" id="orientationRadios1" value="homo" checked>
            <label class="form-check-label" for="orientationRadios1">
              Homo
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="orientation" id="orientationRadios2" value="hetero">
            <label class="form-check-label" for="orientationRadios2">
              Hetero
            </label>
          </div>
        </div>
      </div>
    </fieldset>

    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Education</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="education" id="educationRadios1" value="school" checked>
            <label class="form-check-label" for="educationRadios1">
              School
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="education" id="educationRadios2" value="college">
            <label class="form-check-label" for="educationRadios2">
              College
            </label>
          </div>
        </div>
      </div>
    </fieldset>

    <div class="form-group row">
      <label for="age" class="col-sm-2 col-form-label">Salary</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="salary" id="salary" value="1000" >
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Sign up</button>
      </div>
    </div>

  </form>
</div>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/person_storage.inc.php';

    $userInfo = array(
        "firstName" => $_POST['firstName'],
        "lastName" => $_POST['lastName'],
        "age" => $_POST['age'],
        "sex" => $_POST['sex'],
        "smoke" => (isset($_POST['smoke']) ? 'yes' : 'no'),
        "orientation" => $_POST['orientation'],
        "education" => $_POST['education'],
        "salary" => $_POST['salary']
    );

    // XXX: Actually we can even try to just persist $_POST

    $fileName = construct_file_name($userInfo);
    $rawText = array_to_properties_text($userInfo);

    write_to_file($fileName, $rawText);
    ?>
        <div class="alert alert-success" role="alert">
            New person had been successfully added.
        </div>
    <?php

}
?>
