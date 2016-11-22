<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            PHOTOS
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i><a href="index.php"> Dashboard</a>
            </li>
          <li class="active">
                <a href="upload.php"><i class="fa fa-file"></i> Upload</a>
            </li>
            <li class="active">
                  <a href="photos.php"><i class="fa fa-camera"></i> Photos</a>
              </li>
        </ol>

        <?php
        if(isset($_GET['edit'])) {
          $photo_id = $_GET['edit'];
          $photo = Photo::find_by_id($photo_id, "photo_id");

          if(isset($_POST["update"])) {

            if($photo->validate_image_upload()) {
              $photo->update_image("photo_id");
            }

          }
        }
        ?>

        <div class="row">
          <form action="" enctype="multipart/form-data" method="post" class="col-md-4">
            <h3><?php if(!empty($upload_errors)){ echo $message; } ?></h3>
            <div class="form-group">
              <input type="text" name="title" class="form-control" value="<?php echo $photo->title; ?>">
            </div>
            <div class="form-group">
              <textarea type="file" name="description" class="form-control"><?php echo $photo->description; ?></textarea>
            </div>
            <div class="form-group">
              <img style="display:block; height:150px; margin-bottom: 20px;" src="<?php echo $photo->image_path(); ?>" alt="">
              <input type="file" name="image" class="form-control" require>
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
          </form>
        </div>
        </div>
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- /.row -->
