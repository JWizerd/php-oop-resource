<?php include("includes/header.php"); ?>

  <!-- Navigation -->
  <?php include('includes/navigation.php'); ?>

  <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    UPLOAD
                    <small>Pictures</small>
                </h1>
                <?php
                if(isset($_POST["submit"])) {
                  $upload_errors = array(
                    UPLOAD_ERR_OK          => "Successfully Uploaded.",
                    UPLOAD_ERR_INI_SIZE    => "File exceeds upload_max_filesize set in php.ini",
                    UPLOAD_ERR_FORM_SIZE   => "File exceeds Maximum upload size",
                    UPLOAD_ERR_PARTIAL     => "File only partially uploaded.",
                    UPLOAD_ERR_NO_FILE     => "No File Uploaded.",
                    UPLOAD_ERR_NO_TMP_DIR  => "No Temporary Upload Folder",
                    UPLOAD_ERR_CANT_WRITE  => "Failed to write to file disk",
                    UPLOAD_ERR_EXTENSION   => "A PHP Extension stopped file upload",
                  );

                  $the_error = $_FILES['image']['error'];

                  $message = $upload_errors[$the_error];
                  $temp_image = $_FILES['image']['tmp_name'];
                  $image_file = $_FILES['image']['name'];
                  $image_directory = "images/";

                  move_uploaded_file($temp_image, $image_directory . $image_file);
                }
                ?>
                <div class="row">
                  <form action="" enctype="multipart/form-data" method="post" class="col-md-4">
                    <h3><?php if(!empty($upload_errors)){ echo $message; } ?></h3>
                    <div class="form-group">
                      <input type="file" name="image" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                  </form>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->


  </div>
  <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
