<?php
  include("includes/header.php");
  if(!$session->is_signed_in()) {
    redirect("login.php");
  }
?>



  <!-- Navigation -->
  <?php include('includes/navigation.php'); ?>

  <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Hello, <?php echo User::find_user_by_session_id()->get_full_name(); ?>
                </h1>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->


  </div>
  <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
