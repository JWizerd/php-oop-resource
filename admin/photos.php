<?php include("includes/header.php"); ?>

  <!-- Navigation -->
  <?php include('includes/navigation.php'); ?>

  <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    PHOTOS
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                      <i class="fa fa-dashboard"></i><a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="upload.php"><i class="fa fa-file"></i> Upload</a>
                    </li>
                </ol>
                <h2><?php echo User::find_user_by_session_id($_SESSION['user_id'])->get_full_name(); ?>'s Photo Gallery</h2>
                <?php $photos = Photo::find_photos_by_user_id($_SESSION['user_id']); ?>
                <?php if (!empty($photos)): ?>
                  <?php foreach ($photos as $photo) : ?>
                    <div class="col-sm-3">
                      <h4><?php echo $photo->title; ?></h4>
                        <img style="display:inline-block; width:40%; height: 150px; margin: 0 auto;" src="images/<?php echo $photo->filename; ?>" alt="">
                        <a class="btn btn-danger" style="display:block; width:20%; margin-top: 20px;" href="photos.php?delete=<?php echo $photo->photo_id; ?>">Delete</a>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
                <?php
                if (isset($_GET['delete'])) {
                  $photo_id = $_GET['delete'];
                  $photo->delete_photo($photo_id);
                  redirect('photos.php');
                }
                ?>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->


  </div>
  <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
