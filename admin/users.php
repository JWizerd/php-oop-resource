<?php include("includes/header.php"); ?>
<?php
  if(!$session->is_signed_in()) {
    redirect("login.php");
  } elseif ($_SESSION['username'] != 'admin') {
    redirect('index.php');
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
                    USERS
                    <small>All Users</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Add User
                    </li>
                </ol>
                <?php include('includes/show-users.php'); ?>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->


  </div>
  <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
