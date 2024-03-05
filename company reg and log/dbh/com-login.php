<?php
   require_once 'dbconnection.php';

    $email=$_POST['Email'];
    $password=$_POST['Password'];
    
    if (isset($_POST['login']))
    {
        $query = "SELECT * FROM `company` WHERE `email` = '$_POST[Email]' AND `password` = '$_POST[Password]'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1)
        {
            session_start();
            $companyDetails = mysqli_fetch_assoc($result);

            //session loged here
            $_SESSION['companyId'] = $companyDetails['id_company'];

             //header redirrecting here 
            header('location: ../company_register.html');
            exit;
        }
        else
        {
            echo "<script>alert('Oops Something Went Wrong!');
            window.location.href = '../company_login.html';
            </script>";
            exit;
        }
    }

    ?>
