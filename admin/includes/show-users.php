<?php $users = User::all(); ?>

<table class="table">
  <thead>
    <tr>
      <td><strong>ID</strong></td>
      <td><strong>Username</strong></td>
      <td><strong>First Name</strong></td>
      <td><strong>Last Name</strong></td>
    </tr>
  </thead>
  <?php foreach ($users as $user): ?>
    <?php if ($user->user_id != $_SESSION['user_id']) : ?>
      <tr>
        <td><?php echo $user->user_id ?></td>
        <td><?php echo $user->username ?></td>
        <td><?php echo $user->first_name ?></td>
        <td><?php echo $user->last_name ?></td>
        <td><a class="btn-danger" href="users.php?delete=<?php echo $user->user_id; ?>">Delete</a></td>
      </tr>
    <?php endif; ?>
  <?php endforeach; ?>

  <?php
  if(isset($_GET['delete'])) {
    $user = User::find_by_id($_GET['delete'], "user_id");
    $user->delete("user_id");
    redirect('users.php');
  }
  ?>
</table>
