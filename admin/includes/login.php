<?php

require_once('init.php');

if ($session->is_signed_in()) {
  redirect("index.php");
}

if(isset($_POST['submit'])) {
  $username = trim($_POST['useranme']);
  $password = trim($_POST['useranme']);

  // check database for user
  $user_found = User::verify_user($username, $password);

  // if user is found in db,  login
  if($user_found) {
    $session->login($user_found);
    redirect('index.php');
  } else {
    $message = "User could not be found";
    $username = "";
    $password = "";
  }
}

?>

<form class="" action="login.php" method="post">
  .form-group 
  <input type="button" name="name" value="">
</form>
