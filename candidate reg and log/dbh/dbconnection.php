<?php
$server="localhost";
$username="root";
$password="";
$dhname="kkk";

$conn =mysqli_connect("$server","$username","$password","$dhname");

if(!$conn){
    echo "hari yan na";
}



?>