<?php
    require_once 'dbconnection.php';

    $pwd=$_POST['Password'];
    $email=$_POST['Email'];


        if (isset($_POST['login']))
        {
            $query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pwd'";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) == 1)
            {
                session_start();
                $userDetails = mysqli_fetch_assoc($result);

                ///session loged here
                $_SESSION['userId'] = $userDetails['id_user'];

            
                    //header redirrecting  here
                header("location: ../images.jpg");
                exit;
            }
            else
            {
                echo "<script>alert('Oops Something Went Wrong!');
                        window.location.href = '../c_login.html';
                </script>";
            }
        }

    ?>

      