<?php

require_once('includes/header.php');

if(isset($_POST['submit'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);

  if (User::validate_username($username) == "true") {
    echo "<h4 class='text-primary'>" . $session->message("Username Taken. Please choose another one.") . "</h4>";
  } else {
    $user = new User();

    $user->username = $username;
    $user->password = $password;
    $user->first_name = $first_name;
    $user->last_name = $last_name;

    $user->create();
    $session->login($user);
    redirect('index.php');
  }
}
?>
