<?php include("includes/header.php"); ?>

  <!-- Navigation -->
  <?php include('includes/navigation.php'); ?>

  <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    DASHBOARD
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                    <?php

                      $a_user = $user->find_all_users();

                      while($row = mysqli_fetch_assoc($a_user)) {
                        $row['username']
                      }

                    ?>
                </ol>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->


  </div>
  <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
