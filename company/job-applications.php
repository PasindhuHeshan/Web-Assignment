<?php
session_start();

if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Career Plus</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- js -->
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>
<body>

  <div class="wrapper">
  <header class="main-header">
      <a href="index.php" class="logo">
        <img class="header-logo" src="../img/career plus.png" alt="career plus logo" >
      </a>
      <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="../jobs.php">Jobs</a>
          </li>          
        </ul>
      </div>
    </nav>
      
    </header>
    <div class="content-wrapper">
      <div class="row">
          <div class="col-md-3">
            <div class="box-nav ">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li ><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="edit-company.php"><i class="fa fa-tv"></i> My Company</a></li>
                  <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Job Post</a></li>
                  <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Job Post</a></li>
                  <li class="active"><a href="job-applications.php"><i class="fa fa-file-o"></i> Job Application</a></li>
                  <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <div class="box box-content">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2>Recent Applications</h2>
                </div>
                    <?php
                    $sql = "SELECT * FROM job_post 
                    INNER JOIN apply_job_post 
                    ON job_post.id_jobpost=apply_job_post.id_jobpost  
                    INNER JOIN users ON users.id_user=apply_job_post.id_user 
                    WHERE apply_job_post.id_company='$_SESSION[id_company]'";
                          $result = $conn->query($sql);

                          if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {     
                    ?>
                    <div class="card mb-3">
                    <h5 class="card-title"><a href="view-job-post.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $row['id_jobpost']; ?>">
                            
                          <?php 
                            echo $row['jobtitle'].' @ ('.$row['firstname'].' '.$row['lastname'].')'; 
                          ?>
                          </a>
                        </h5>

                    <div class="attachment-text padding-2">
                      <div class="pull-left"><i class="fa fa-calendar"></i> <?php echo $row['createdat']; ?></div>  
                      <?php 

                      if($row['status'] == 0) {
                        echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
                      } else if ($row['status'] == 1) {
                        echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
                      } else if ($row['status'] == 2) {
                        echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div> ';
                      }
                      ?>
                                    
                    </div>
                    </div>

                    <?php
                      }
                    }
                    ?>
              </div> 
            </div> 
          </div>
        </div>
  

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2024 <a href="#">Career Plus</a>.</strong>
    </div>
  </footer>



</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
