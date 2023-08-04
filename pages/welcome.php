<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!=true){
    header("location:/loginsys/login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/navbar.css">
    <style>
    .rightnavnj{
        width:100%;
    }
    </style>
</head>
<body>
    <?php require "./comp/navbar.php"?>
    <h1>welcome <?php echo $_SESSION['username'];?></h1>
    <h2>I will put notes application here </h2>

</body>
</html>