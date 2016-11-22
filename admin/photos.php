<?php include("includes/header.php"); ?>

  <!-- Navigation -->
  <?php include('includes/navigation.php'); ?>

  <div id="page-wrapper">

    <div class="container-fluid">
    <?php
    if (isset($_GET['edit'])) {
      include('includes/form-edit.php');
    } elseif (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      $photo = Photo::find_by_id($id, "photo_id");
      $photo->delete_photo($id);
      redirect('photos.php');
    } else {
      include('includes/show-photos.php');
    }
    ?>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
