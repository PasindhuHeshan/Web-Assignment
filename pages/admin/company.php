<?php
require ("../../db/database.php");

// Handle delete operation if ID is provided
if (isset($_GET['delete_id'])) {
  $delete_id = $_GET['delete_id'];
  $sql = "DELETE FROM company WHERE id_company = $delete_id";
  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $mysqli->error;
  }
}

$sql = "SELECT * FROM company";
$result = $conn->query($sql);

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
        <a class="navbar-brand" href="dashboard">CareerPlus</a>
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
      <div class="row align-items-center">
        <div class="col-md-6 d-flex justify-content-start">
            <h1 class="text-center p-3 ps-5 fs-1">Manage Companies</h1>
        </div>
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="col-md-6 fs-3 p-3 d-flex align-items-center justify-content-end">
                    <a class="btn btn-primary me-4" href="dashboard.php">Back to homepage</a>
                    <a class="btn btn-success me-4" href="company/createCompany.php">Add New Company</a>
                </div>
            </div>
        </div>
      </div>
      <hr>
    </div>


    <div class="row p-3">
      <table class="table table-dark table-striped">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Company Name</th>
                  <th scope="col">Account Creator Name</th>
                  <th scope="col">e-Mail</th>
                  <th scope="col">Contact Number</th>
                  <th scope="col">Country</th>
                  <th scope="col">State</th>
                  <th scope="col">Ciy</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
              </tr>
          </thead>
          <tbody>
          <?php
            if ($result->num_rows > 0) {
              $index =0;
              while($row = $result->fetch_assoc()) {
                $index += 1;
                echo "<tr>
                        <td>".$index."</td>
                        <td>".$row["companyname"]."</td>
                        <td>".$row["name"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["contactno"]."</td>
                        <td>".$row["country"]."</td>
                        <td>".$row["state"]."</td>
                        <td>".$row["city"]."</td>
                        <td>".
                          "<a href='./company/updateCompany.php?id=".$row['id_company']."' class='btn btn-light'>Edit</a>"
                        ."</td>
                        <td>".
                          "<a href='?delete_id=".$row['id_company']."' class='btn btn-danger' onclick='return confirmDelete();'>Delete</a>".
                        "</td>
                      </tr>";
              }
            } else {
            }
            ?>
          </tbody>
      </table>
    </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
      }
    </script>
  </body>
</html>