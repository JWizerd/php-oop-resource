<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            PHOTOS
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i><a href="index.php">Dashboard</a>
            </li>
            <li class="active">
                <a href="upload.php"><i class="fa fa-file"></i>Upload</a>
            </li>
        </ol>

        <?php
        if(isset($_POST["submit"])) {
          $photo->validate_image_upload();
        }
        ?>
        <div class="row">
          <form action="" enctype="multipart/form-data" method="post" class="col-md-4">
            <h3><?php if(!empty($upload_errors)){ echo $message; } ?></h3>
            <div class="form-group">
              <input type="text" name="title" class="form-control" value="give your image a title.">
            </div>
            <div class="form-group">
              <textarea type="file" name="description" class="form-control">Tell us a bit about the photo fucker.</textarea>
            </div>
            <div class="form-group">
              <input type="file" name="image" class="form-control" require>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
          </form>
        </div>
        </div>
        </div>
        <!-- /.row -->

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
