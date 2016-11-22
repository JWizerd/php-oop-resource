<?php
$user = User::find_user_by_session_id();

if (!$session->is_signed_in()) {
  redirect("index.php");
}

if(isset($_POST['submit'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);

  $user->username = $username;
  $user->password = $password;
  $user->first_name = $first_name;
  $user->last_name = $last_name;

  if ($user->update()) {
    redirect('index.php');
  }
}

// delete user if delete account button is clicked
if(isset($_GET['delete'])) {
  if($_GET['delete'] == $user->user_id) {
    $user->delete_user($_SESSION['user_id']);
  }
}
?>
