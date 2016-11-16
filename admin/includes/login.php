<?php

require_once('init.php');

if ($session->is_signed_in()) {
  redirect("../index.php");
}

if(isset($_POST['submit'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

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
    echo $message;
  }
}

?>

<form class="" action="login.php" method="post">
  <div class="form-group">
    <input class="form-control" type="text" name="username" placeholder="Enter Username" required autocomplete="on">
  </div>
  <div class="form-group">
    <input class="form-control" type="text" name="password" placeholder="Enter Password" required>
  </div>
  <div class="form-group">
    <input class="form-control" type="submit" name="submit">
  </div>
</form>
