<?php include('includes/form-login.php'); ?>

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
