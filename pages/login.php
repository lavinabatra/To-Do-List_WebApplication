<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <?php 
    require "../comp/navbar.php";
    require "../comp/_lgaccount.php";
    require "../comp/error_handle.php";
     require "../comp/success_handle.php";

    ?>
    
    <div class="containernj">
        <h1>Login To Your Account</h1>
        <form action="/naman/pages/login.php" method="post">
        <label for="emaillog">E-mail:</label>
        <input type="email" name=emaillog id=emaillog placeholder="Enter Your Email">
        <label for="passwordlog">Password:</label>
        <input type="password" name=passwordlog id="passwordlog" placeholder="Enter Your Password ">
        <button type="submit"  id="submit">Log in</button>
    </form>
    </div>




    <!-- javascript i am using bootstrape for ease life  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</body>
</html>
</html>