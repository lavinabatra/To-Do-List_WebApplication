<?php
if($signinsuccess){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Hurry!!</strong> Account created Successfully <a href='/lavina/pages/login.php'>Login Now</a>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
if($login){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Hurry!!</strong> You are Sucessfully logged in <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>