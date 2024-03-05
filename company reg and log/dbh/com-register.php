<?php
require_once 'dbconnection.php';


$name=$_POST['fullName'];
$cname=$_POST['companyName'];
$country=$_POST['country']; 
$phonenumber=$_POST['phoneNumber'];
$website=$_POST['webSite'];
$email=$_POST['Email'];
$password=$_POST['Password'];
$confirmpassword=$_POST['confirmPassword'];
$introduction=$_POST['Introduction'];
$file=$_POST['logo'];


if($password == $confirmpassword)  {

$sql="INSERT INTO `company`(`name`, `companyname`, `country`, `contactno`, `website`, `email`, `password`, `aboutme`, `logo`) VALUES ('$name','$cname','$country','$phonenumber','$website','$email','$password','$introduction','$file')";

$runn=mysqli_query($conn,$sql);
if ($runn){
    echo "<script>alert('Your Account Was Created Successfully');
                 window.location.href = '../company_login.html';
            </script>";
    //header('location:../company_login.html');
    exit;
}
else {
    echo "Error: " . mysqli_error($conn);
}
}
else{
    echo "<script>alert('Passwords Not Matching !');
             window.location.href = '../company_register.html';
            </script>";
}
?>


