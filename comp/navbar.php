<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!=TRUE){
    $loggedin=FALSE;
}
else{
    
    $loggedin=TRUE;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>
    <nav class="navbarnj">
        
        <?php
        if(!$loggedin){
        echo "<ul>
            <li><a href='/lavina/index.php'>Home</a></li>
            <li><a href='/lavina/pages/about.php'>About Us</a></li>
            <li><a href='/lavina/pages/contact.php'>Contact Us</a></li>
        </ul>";
        }
        ?>
        <div class="rightnavnj">
            
               
                <?php
                if($loggedin){
                    echo "<a href='/lavina/pages/logout.php'>Log Out</a>";
                }
                if(!$loggedin){
                   echo "<a href='/lavina/pages/sign_in.php'>Create account</a>
                        <a href='/lavina/pages/login.php'>Log in</a>";
                }
                ?>

            
        </div>
    </nav>
</body>
</html>