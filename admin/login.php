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
?>

<div class="col-md-4 col-md-offset-3">

  <h2 class="text-primary">Login</h2>

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
      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </div>
  </form>

  <a class="btn btn-info" href="signup.php">Sign Up</a>

</div>
