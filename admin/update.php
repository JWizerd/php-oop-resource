<?php

require_once('includes/header.php');

include('includes/navigation.php');

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
    $user->delete();
  }
}
?>

<div class="col-md-4 col-md-offset-3">

  <h2 class="text-primary">Update Details</h2>

  <form id="login-id" action="" method="post" autocomplete="on">
    <div class="form-group">
    	<label for="username">Username</label>
    	<input type="text" class="form-control" name="username" id="username" value="<?php echo $user->username ?>">
    </div>

    <div class="form-group">
    	 <label for="password">Password</label>
    	 <input type="password" class="form-control" name="password" value="<?php echo $user->username ?>">
    </div>

    <div class="form-group">
    	 <label for="first_name">first_name</label>
    	 <input type="text" class="form-control" name="first_name" value="<?php echo $user->first_name ?>">
    </div>

    <div class="form-group">
    	 <label for="last_name">last_name</label>
    	 <input type="last_name" class="form-control" name="last_name" value="<?php echo $user->last_name ?>">
    </div>

    <div class="form-group">
      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </div>
  </form>

  <a class="btn btn-danger" href="update.php?delete=<?php echo $user->user_id; ?>">Delete Account</a>

</div>
