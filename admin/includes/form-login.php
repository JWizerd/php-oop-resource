<?php 
require_once('includes/header.php');

if ($session->is_signed_in()) {
  redirect("index.php");
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
    echo $session->message("<h4 class='bg-danger'>User could not be found</h4>");
    $username = $_POST['username'];
    $password = $_POST['password'];
  }
}
