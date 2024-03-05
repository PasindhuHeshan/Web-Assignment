<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php
require_once("db.php");

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CareerPlus-Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/Cabout.css">
  <link rel="stylesheet" type="text/css" href="css/customnew.css">
  <!-- <link rel="stylesheet" href="css/test.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>

  <div class="main01">
    <!-- Header Part -->
    <header style="position: fixed;">
      <nav>
        <div class="logo">
          <img src="img/career plus.png">
        </div>
        <ul class="nav-links">
          <li><a href="#home">Home</a></li>
          <li><a href="http://localhost/careerplus/jobs.php">Jobs</a></li>
          <li><a href="#candidates">Candidates</a></li>
          <li><a href="#companies">Company</a></li>
          <li><a href="#about">About Us</a></li>
          <?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

            <li>
              <div class="dropdown">
                <a>Login</a>
                <div class="dropdown-content">
                  <a href="#"> Candidate Login</a>
                  <a href="#"> Company Login</a>
                  <a href="../pages/auth/login"> Admin Login</a>
                </div>
              </div>
            </li>
            <li>
              <div class="dropdown">
                <a>Sign Up</a>
                <div class="dropdown-content">
                  <a href="#"> Candidate Sign Up</a>
                  <a href="#"> Company Sign Up</a>
                </div>
              </div>
            </li>

          <?php } else {
            if (isset($_SESSION['id_user'])) {
              ?>
              <li>
                <a href="user/index.php">Dashboard</a>
              </li>
              <?php
            } else if (isset($_SESSION['id_company'])) {
              ?>
                <li>
                  <a href="company/index.php">Dashboard</a>
                </li>
            <?php } ?>
            <li>
              <a href="logout.php">Logout</a>
            </li>
          <?php } ?>
        </ul>
  </div>
  </nav>
  </header>
  <section id="home">
    <section class="content-header bg-main"
      style="background: linear-gradient(0deg,rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('http://localhost/careerplus/img/home.jpg') no-repeat center center fixed !important; 
                 -webkit-background-size: contain;	-moz-background-size: contain;	-o-background-size: contain;	background-size: contain !important; height= 40rem ">
      <div class="container">
        <div class="row">
          <div class="col-md-12 index-head">
            <br />
            <h1><strong>All JOBS IN ONE PLACE</strong></h1><br /><br>
            <p>One Search, Global Reach</p>

            <a href="jobs.php" class="search-button"><b>Search Jobs</b></a>
          </div>
        </div>
      </div>
    </section>
    <br />
    <br />
  </section>
  </section>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper" style="margin-left: 0px;">
    <section id="jobs">
      <section class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12 latest-job margin-bottom-20">
              <h1 class="container-title">Latest Jobs</h1><br />
              <?php
              /* Show any 4 random job post
               * 
               * Store sql query result in $result variable and loop through it if we have any rows
               * returned from database. $result->num_rows will return total number of rows returned from database.
               */
              $sql = "SELECT * FROM job_post Order By Rand() Limit 4";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
                  $result1 = $conn->query($sql1);
                  if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                      ?>
                      <div class="card">
                        <div class="card-left">
                          <img src="http://localhost/careerplus/img/icon2.jpg" alt="New Job">
                        </div>
                        <div class="card-center">
                          <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>">
                              <?php echo $row['jobtitle']; ?>
                            </a>
                            <span class="attachment-heading pull-right">Rs
                              <?php echo $row['maximumsalary']; ?>/Month
                            </span>
                          </h4>
                          <div class="attachment-text">
                            <div><strong>
                                <?php echo $row1['companyname']; ?> |
                                <?php echo $row1['city']; ?> | Experience
                                <?php echo $row['experience']; ?> Years
                              </strong></div>
                          </div>
                        </div>
                      </div>
                      <?php
                    }
                  }
                }
              }
              ?>

            </div>
          </div>
        </div>
      </section>
    </section>

    <section id="candidates">
      <div class="col-md-12 text-center latest-job margin-bottom-20">
        <h1 class="container-title">Candidates</h1><br>
        <p>Finding a job just got easier. Create a profile and apply with single mouse click.</p>
      </div>
      <div class="wrapper">
        <div class="card">
          <div class="row">
            <div class="candidate-img">
              <img src="http://localhost/careerplus/img/browsejob.jpg" alt="Browse Jobs">
              <div class="caption">
                <h3 class="text-center">Browse Jobs</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="candidate-img">
              <img src="http://localhost/careerplus/img/interview.jpg" alt="Apply & Get Interviewed">
              <div class="caption">
                <h3 class="text-center">Apply & Get Interviewed</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="candidate-img">
              <img src="http://localhost/careerplus/img/startjob.jpg" alt="Start A Career">
              <div class="caption">
                <h3 class="text-center">Start A Career</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><br>

    <section id="companies">
      <div class="col-md-12 text-center latest-job margin-bottom-20">
        <h1 class="container-title">Companies</h1><br>
        <p>Hiring? Register your company for free, browse our talented pool, post and track job applications</p>
      </div>
      <div class="wrapper">
        <div class="card">
          <div class="row">
            <div class="candidate-img">
              <img src="http://localhost/careerplus/img/jobposting.jpg" alt="Browse Jobs">
              <div class="caption">
                <h3 class="text-center">Post a Job</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="candidate-img">
              <img src="http://localhost/careerplus/img/manage.jpg" alt="Apply & Get Interviewed">
              <div class="caption">
                <h3 class="text-center">Manage & Track</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="candidate-img">
              <img src="http://localhost/careerplus/img/hire.jpg" alt="Start A Career">
              <div class="caption">
                <h3 class="text-center">Hire</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><br>





    <div class="col-md-12 text-center latest-job margin-bottom-20">
      <h1 class="container-title">Our Statistics</h1>
    </div>

    <section class="stat-container">
      <div class="stat-item">

        <?php
        $sql = "SELECT * FROM job_post";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $totalno = $result->num_rows;
        } else {
          $totalno = 0;
        }
        ?>
        <h3>
          <?php echo $totalno; ?>
        </h3>

        <p>Job Offers</p>
        <div class="icon">
          <i class="ion ion-ios-paper"></i>
        </div>
      </div>

      <div class="stat-item">

        <?php
        $sql = "SELECT * FROM company WHERE active='1'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $totalno = $result->num_rows;
        } else {
          $totalno = 0;
        }
        ?>
        <h3>
          <?php echo $totalno; ?>
        </h3>

        <p>Registered Company</p>
        <div class="icon">
          <i class="ion ion-briefcase"></i>
        </div>

      </div>

      <div class="stat-item">

        <?php
        $sql = "SELECT * FROM users WHERE resume!=''";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $totalno = $result->num_rows;
        } else {
          $totalno = 0;
        }
        ?>
        <h3>
          <?php echo $totalno; ?>
        </h3>

        <p>CV'S/Resume</p>
        <div class="icon">
          <i class="ion ion-ios-list"></i>
        </div>

      </div>

      <div class="stat-item">

        <?php
        $sql = "SELECT * FROM users WHERE active='1'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $totalno = $result->num_rows;
        } else {
          $totalno = 0;
        }
        ?>
        <h3>
          <?php echo $totalno; ?>
        </h3>

        <p>Daily Users</p>
        <div class="icon">
          <i class="ion ion-person-stalker"></i>
        </div>
      </div>
    </section>

    <div class="about-img">
      <img class="logo1"
        style="width: 30rem;	height: 18rem;	border-radius: 5px;	object-fit:contain;	padding: 30px; margin-top: 30px"
        src="img/career-plus-logo-v.png" alt="CareerPlus Logo">
      <img class="team"
        style="width: 38rem;	height: 21rem;	float:left;	object-fit:contain;	padding: 10px; margin-right: 40px"
        src="http://localhost/careerplus/img/team.jpg" alt="Our Team">
    </div>

    <section id="about">
      <div class="about">
        <h1 style="color: black; text-align:left">About Us</h1>
      </div>
      <div class="about-info">
        <div class="about-details">

          <h2>Who We Are</h2>
          <p>CareerPlus is a job board dedicated to connecting top talent with exciting job opportunities in a variety
            of industries. Our mission is to make the job search process easier and more efficient for both job seekers
            and employers.</p>

          <h2>Our Story</h2>
          <p>CareerPlus was founded by a team of experienced recruiters and HR professionals who saw a need for a more
            streamlined and effective way to connect job seekers and employers. We believe that by leveraging technology
            and data, we can make the job search process more transparent and less time-consuming for everyone involved.
          </p>

          <h2>Our Team</h2>
          <p>Our team is made up of experienced recruiters and HR professionals who are passionate about connecting top
            talent with exciting job opportunities. We have years of experience in the industry, and we are dedicated to
            using our expertise to help job seekers and employers find each other.</p>

        </div>
      </div>
    </section>


    <!-- Footer Start -->
    <section id="contact">
      <div class="qlarea">
        <div class="container01">
          <section id="quick-links">
            <h1 class="container-title">Quick Links</h1><br>
            <ul>
              <li><a href="#about"><b>About Us</a></li>
              <li><a href="#contact">Contact Us</a></li>
              <li><a href="#candidates">Our Services</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms & Condition</b></a></li>
            </ul>
          </section>
        </div>
        <div class="container02">
          <section id="contact-info">
            <h2>Contact Us</h2><br>
            <p>RA De Mel Mawatha,<br>Colombo 04, Bambalapitiya<br><br>+94 76 766 5560</p><br>
            <p><strong>Email:</strong> <a href="mailto:info@careerplus.com">info@careerplus.com</a></p>
          </section>
        </div>
        <div class="container03">
          <section id="feedback-form">
            <h2>Feedback</h2><br>
            <form>
              <label for="name">Name:</label><br>
              <input type="text" id="name" name="name"><br>
              <label for="email">Email:</label><br>
              <input type="email" id="email" name="email"><br>
              <label for="message">Message:</label><br>
              <textarea id="message" name="message"></textarea><br>
              <button type="submit">Send</button>
            </form>
          </section>
        </div>
      </div>
    </section>
    <footer>
      <p>© 2024 CareerPlus. All Rights Reserved.</p>
    </footer>
  </div>
  <!-- Footer End -->



  <!-- ./wrapper -->


</body>

</html>