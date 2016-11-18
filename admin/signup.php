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

<div class="col-md-4 col-md-offset-3">

  <h2 class="text-primary">Sign Up</h2>

  <form id="login-id" action="" method="post" autocomplete="on">
    <div class="form-group">
    	<label for="username">Username</label>
    	<input type="text" class="form-control" name="username" id="username" value="<?php if (!empty($username)) { echo htmlentities($username); } ?>">
    </div>

    <div class="form-group">
    	 <label for="password">Password</label>
    	 <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
    	 <label for="first_name">first_name</label>
    	 <input type="text" class="form-control" name="first_name">
    </div>

    <div class="form-group">
    	 <label for="last_name">last_name</label>
    	 <input type="last_name" class="form-control" name="last_name">
    </div>

    <div class="form-group">
      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </div>
  </form>

</div>
