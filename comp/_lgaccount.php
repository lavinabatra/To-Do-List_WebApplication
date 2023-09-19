<?php
require "_dbconnect.php";
require "_error.php";
require "success.php";
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    // taking post requests 
    $emaillog=$_POST["emaillog"];
    $passwordlog=$_POST["passwordlog"];
    $query="SELECT * FROM `users` where email='$emaillog' ";
    $check=mysqli_query($connect,$query);
    $number=mysqli_num_rows($check);

   
    // echo "$number";
    if($number==1){
         // To fetch the data associate with the check result 
        while($fetch=mysqli_fetch_assoc($check)){
            if(password_verify($passwordlog,$fetch['pass'])){
                $username= $fetch["username"];
                $srno=$fetch["s.no"];
                // echo "you are logged in";
                $login=TRUE;
                // creating database of the user for notes in the time of login 
                $createpersonaldb="CREATE TABLE `notes`.`$srno` ( `sr.no` INT(11) NOT NULL AUTO_INCREMENT ,  `title` TEXT NOT NULL ,  `description` LONGTEXT NOT NULL ,  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`sr.no`)) ENGINE = InnoDB";
                $result=mysqli_query($connect2,$createpersonaldb);
                // if ($result){
                //     echo "hurrya success";
                // }
                // else{
                //     echo "try again it is a faliure";
                // }
                
                session_start();
                $_SESSION["loggedin"]=TRUE;
                $_SESSION["username"]=$username;
                $_SESSION["s.no"]=$srno;
                header("Location: /lavina/notesapp/index.php");
                exit();
            }
            else{
                $loginerr=TRUE;
             // echo "it is creating problem";
             }
         

        }
    }
    else{
       $loginerr=TRUE;
    // echo "it is creating problem";
    }

}


?>