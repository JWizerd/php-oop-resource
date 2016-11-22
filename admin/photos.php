<?php include("includes/header.php"); ?>

  <!-- Navigation -->
  <?php include('includes/navigation.php'); ?>

  <div id="page-wrapper">

    <div class="container-fluid">
    <?php isset($_GET['edit']) ? include('includes/form-edit.php') : include('includes/show-photos.php'); ?>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
