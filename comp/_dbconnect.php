<!-- This is to connect the database   -->
<?php
$hostname="localhost";
$username="root";
$password="";
$database="users";
$database2="notes";
$connect=mysqli_connect($hostname,$username,$password,$database);
$connect2=mysqli_connect($hostname,$username,$password,$database2);
$connect3=mysqli_connect($hostname,$username,$password);

// checking for working 
if ($connect){
    // echo "we are connected successfully";
}
else {
    header("Location: /naman/error_hand/error.html");
    exit();
}

if($connect2){
    // echo "connected successfully";
}
else{
    header("Location: /naman/error_hand/error.html");
    exit();
}




// creating users databasetable  if it doesnot exist 
$users="CREATE TABLE `users`.`users` ( `s.no` INT(11) NOT NULL AUTO_INCREMENT ,  `username` TEXT NOT NULL ,  `pass` TEXT NOT NULL ,  `email` TEXT NOT NULL ,  `phone` BIGINT(11) NOT NULL ,  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`s.no`)) ENGINE = InnoDB";
    $confirm=mysqli_query($connect,$users);
    if ($confirm){
        // echo "created successfully";
    }
    else{
        // echo "already created";
    }




//connection to the datastrusture
$query="SELECT * FROM `users`";
$datastr=mysqli_query($connect,$query);

// working check 
if($datastr){
    // echo "connected successfully";

}
else{
    header("Location: /naman/error_hand/error.html");
    exit();
}


