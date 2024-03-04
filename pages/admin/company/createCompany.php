<?php
require ("../../../db/database.php");

// Handle insert operation if ID is provided
if (isset($_POST['compname'])) {
  $compname = $_POST["compname"];
  $accname = $_POST["accname"];
  $country = $_POST["country"];
  $state = $_POST["state"];
  $city = $_POST["city"];
  $contact = $_POST["contact"];
  $email = $_POST["email"];
  $sql = "INSERT INTO `company`( `name`, `companyname`, `country`, `state`, `city`, `contactno`, `email`) VALUES ('$accname' , '$compname' , '$country' , '$state' , '$city' , '$contact' , '$email')";
  if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
  } else {
    echo "Error adding record: " . $mysqli->error;
  }
}

$sql1 = "SELECT name FROM countries";
$result1 = $conn->query($sql1);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="./assets/imgs/logo.webp" type="image/icon type">
    <title>Career Plus</title>
  </head>
  <body>
  
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="../dashboard.php">CareerPlus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">About us</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light border border-danger rounded-pill text-danger" href="#">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="page my-3" id="welcome">
      <div class="row">
        <div class="col-md-6 d-flex align-items-center">
          <h1 class="text-center p-3 ps-5 fs-1">Add New Companies</h1>
        </div>
        <div class="col-md-6 fs-3 p-3 d-flex align-items-center justify-content-end">
        </div>
      </div>
      <hr>
    </div>

    <div class="row p-5">
      <!-- Form goes here -->
      <form class="row g-3 needs-validation" method="POST" action= "" >
        <div class="col-md-4">
            <label class="form-label">Company name</label>
            <input type="text" name="compname" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Acoount Creator name</label>
            <input type="text" name="accname" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">e-Mail</label>
            <input type="text" name="email" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Contact Number</label>
            <input type="text" name="contact" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label class="form-label">Country</label>
            <select class="form-select" name="country" required>
            <option selected disabled value="">Choose...</option>
                <?php
                    if ($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_assoc()) {
                        echo    "<option>".$row1["name"]."</option>";
                    }
                    } else {
                    }
                ?>
            </select>
            <div class="invalid-feedback">
            Please select a valid country.
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">State</label>
            <input type="text" name="state" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">City</label>
            <input type="text" name="city" class="form-control" required>
        </div>
        <div class="col-12">
            <a href="../company.php" class="btn btn-secondary" type="submit">Go Back</a>
            <button class="btn btn-primary" type="submit">Add user</button>
        </div>
        </div>
        <?php

        ?>
      </form>
    </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>