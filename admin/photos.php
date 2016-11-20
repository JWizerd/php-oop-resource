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
                <?php $photos = $photo::all(); ?>

                <?php foreach ($photos as $photo) : ?>
                  <div class="col-sm-3">
                    <h4><?php echo $photo->title; ?></h4>
                    <img class="thumbnail img-responsive" src="images/<?php echo $photo->filename; ?>" alt="">
                    <p><?php echo $photo->description; ?></p>
                  </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->


  </div>
  <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
