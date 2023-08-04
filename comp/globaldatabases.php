<?php
// require "./comp/_dbconnect.php";
$hostname="localhost";
$username="root";
$password="";
$connect3=mysqli_connect($hostname,$username,$password);
if($connect3){
    // echo "connected successfully";
}
else{
    header("Location: /naman/error_hand/error.html");
    exit();
}
$sql= "CREATE DATABASE  notes";
$sql2= "CREATE DATABASE  users";
$check=mysqli_query($connect3,$sql);
$check2=mysqli_query($connect3,$sql2);
if($check && $check2){
    // echo "created a database successfully";
    
}
else{
    // echo "alredy exist";
}


?>