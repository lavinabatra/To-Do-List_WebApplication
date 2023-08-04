<?php
if($signin){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Error!!</strong> We are unable to create your account. Please Try again!!
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
if($loginerr){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Either the username or password is wrong please try again !
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
if($emailexist){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  A account is already associated whith this Email Please Try to <a href='/naman/pages/login.php'>Login</a>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}


?>