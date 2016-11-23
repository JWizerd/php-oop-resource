<?php
  if (isset($_GET['photo_id'])) {
    $photo_id = $_GET['photo_id'];
    $photo = Photo::find_by_id($photo_id, 'photo_id');
  }
?>

<h1>Title: <?php echo $photo->title; ?></h1>

<hr>

<strong>Details:</strong>
<li><?php echo $photo->filename; ?></li>
<li><?php echo $photo->type; ?></li>
<li><?php echo $photo->size; ?></li>
<li>Author: <?php $user = User::find_by_id($_GET['user_id'], 'user_id'); echo $user->get_full_name(); ?></li>

<hr>

<!-- Post Content -->
<p class="lead"><?php echo $photo->description; ?></p>


<!-- Photo Comments -->
<?php include('includes/comments.php') ?>
