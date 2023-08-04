<?php
require "_dbconnect.php";
require "_error.php";
require "success.php";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    
    //taking post requests 
    $username=$_POST["username"];
    $password=$_POST["password"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $passwordconfirm=$_POST["passwordconfirm"];
    // checking if the email exist from previous or not 
    $query="SELECT * FROM `users` where email='$email'";
    $check=mysqli_query($connect,$query);
    $number=mysqli_num_rows($check);
    // echo $number;
    if ($number==1){
        $emailexist=TRUE;
    }
    else{
        if($password==$passwordconfirm){
            $hash=password_hash($password,PASSWORD_DEFAULT);

        //inserting to the database
            $insert="INSERT INTO `users` (`username`, `pass`, `email`, `phone`, `date`) VALUES ('$username', '$hash', '$email', '$phone', current_timestamp())";
            $query=mysqli_query($connect,$insert);
            if ($query){
                
                $signinsuccess=TRUE;
            }
            else{
                $signin=TRUE;
            }
        }
        else{
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            The Password You enter Do not Match !
            <button type='button' class='btn-close' data-bs-dismiss='alert'     aria-label='Close'></button>
            </div>";
        }
    }

}


?>