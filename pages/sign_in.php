<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- personal css  -->
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/sign_in.css">

</head>
<body>
    <?php require "../comp/navbar.php";
     
     require "../comp/_craccount.php";
     require "../comp/error_handle.php";
     require "../comp/success_handle.php";
    ?>
    <div class="containernj">
        <h1>Create account</h1>
        <form action="/lavina/pages/sign_in.php" method="post">
            <label for="username">Name:</label>
            <input type="username" name="username" id="username" placeholder="Enter Name Here" required>
            <label for="email">E-Mail:</label>
            <input type="email" name="email" id="email" placeholder="Enter Your E-mail"  require>
            <label for="password" >Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password here" required>
            <label for="passwordconfirm">Confirm Password:</label>
            <input type="password" name="passwordconfirm" id="passwordconfirm" placeholder="Confirm Your Password" required>
            <label for="Phone">Phone Number:</label>
            <input type="phone" name="phone" id="phone" placeholder="Enter Phone Number (optional)">
            <button type="submit"  id="submit">Create account</button>
        </form>
    </div>

    <!-- javascript i am using bootstrape for ease life  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>