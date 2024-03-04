<?php
require ("../../../db/database.php");

// Handle update operation if ID is provided
if (isset($_POST['firstname'])) {
  $update_id = $_GET['id'];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $contactno = $_POST["contactno"];
  $country = $_POST["country"];
  $state = $_POST["state"];
  $city = $_POST["city"];
  $sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`contactno`='$contactno',`country`='$country',`state`='$state',`city`='$city' WHERE id_user = '$update_id'";
  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $mysqli->error;
  }
}

$sql1 = "SELECT * FROM users WHERE id_user=".$_GET['id'];
$sql2 = "SELECT name FROM countries";

$result1 = $conn->query($sql1);
$user_record = $result1->fetch_assoc();
$result2 = $conn->query($sql2);

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
          <h1 class="text-center p-3 ps-5 fs-1">Edit User</h1>
        </div>
        <div class="col-md-6 fs-3 p-3 d-flex align-items-center justify-content-end">
        </div>
      </div>
      <hr>
    </div>

    <div class="row p-5">
      <!-- Form goes here -->
      <form class="row g-3 needs-validation" method="POST" action= "" >
        <div class="col-md-4 d-none">
            <label class="form-label">ID</label>
            <input type="text" name="id" class="form-control" value="<?php echo $_GET['id'] ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">First name</label>
            <input type="text" name="firstname" class="form-control" value="<?php echo $user_record['firstname'] ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Last name</label>
            <input type="text" name="lastname" class="form-control" value="<?php echo $user_record['lastname'] ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">e-Mail</label>
            <input type="text" name="email" class="form-control" value="<?php echo $user_record['email'] ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Contact Number</label>
            <input type="text" name="contactno" class="form-control" value="<?php echo $user_record['contactno'] ?>" required>
        </div>
        <div class="col-md-3">
            <label class="form-label">Country</label>
            <select class="form-select" name="state" selected="<?php echo $user_record['country'] ?>" required>
            <option selected disabled value="">Choose...</option>
                <?php
                    if ($result2->num_rows > 0) {
                    while($row2 = $result2->fetch_assoc()) {
                        echo    "<option value='".$row2["name"]."'>".$row2["name"]."</option>";
                    }
                    } else {
                    }
                ?>
            </select>
            <div class="invalid-feedback">
            Please select a valid country.
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label">State</label>
            <input type="text" name="state" class="form-control" selected="<?php echo $user_record['state'] ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">City</label>
            <input type="text" name="city" class="form-control" selected="<?php echo $user_record['city'] ?>" required>
        </div>
        <div class="col-12">
            <a href="../user.php" class="btn btn-secondary" type="submit">Go Back</a>
            <button class="btn btn-primary" type="submit">Save Changes</button>
        </div>
        </div>
      </form>
    </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>