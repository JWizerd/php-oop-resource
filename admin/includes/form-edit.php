<!-- Page Heading -->
<div class="row">
    <div class="col-md-12">
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

            if($photo->validate_image_upload() == "file already exists.") {
              $photo->update_image("photo_id");
            }

          }
        }
        ?>

        <div class="row">
          <form action="" enctype="multipart/form-data" method="post" class="col-md-4" id="update-image">
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
          </form>
          <aside class="col-md-4 col-md-offset-2">
            <h2>Details</h2>
            <ul style="list-style:none; padding-left: 0;">
              <li><strong>ID:</strong> <?php echo $photo_id; ?></li>
              <li><strong>Filename:</strong> <?php echo $photo->filename; ?></li>
              <li><strong>Type:</strong> <?php echo $photo->type; ?></li>
              <li><strong>Size:</strong> <?php echo $photo->size / 100000; ?>MB</li>
            </ul>
            <input type="submit" name="update" value="Update" class="btn btn-primary" form="update-image">
            <a class="btn btn-danger" href="photos.php?delete=<?php echo $photo->photo_id; ?>">Delete</a>
          </aside>
        </div>
      </div><!-- /.row -->
    </div>
  </div>
</div>
<!-- /.row -->
