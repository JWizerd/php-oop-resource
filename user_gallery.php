<?php include('includes/header.php'); ?>
<?php
  if (isset($_GET['user_id'])) {
    $user = User::find_by_id($_GET['user_id'], 'user_id');
  }
?>
  <div class="row">
    <!-- Blog Post Content Column -->
    <div class="col-md-8">
      <!-- Title -->
      <h1>Artist: <?php echo $user->get_full_name(); ?></h1>

      <hr>

      <strong>Details:</strong>
      <p>Username: <?php echo $user->username; ?></p>

      <hr>

      <!-- Post Content -->
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

      <!-- Blog Comments -->

    </div>
    <div class="col-md-4 well">
      <h2>Gallery</h2>
      <?php $photos = Photo::find_photos_by_user_id($user->user_id); ?>
      <?php foreach ($photos as $photo): ?>
        <h4><?php echo $photo->title; ?></h4>
        <img class="img-responsive" src="admin/<? echo $photo->image_path(); ?>" alt="">
      <?php endforeach; ?>
    </div>
  </div>

  <?php include("includes/footer.php"); ?>
