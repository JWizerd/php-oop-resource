<?php
if(isset($_POST["submit"])) {

  $message = $photo->error_upload();

  if($message == "Successfully Uploaded.") {

    $temp_image      = $_FILES['image']['tmp_name'];
    $image_file      = $_FILES['image']['name'];
    $image_directory = "images";

    move_uploaded_file($temp_image, $image_directory . "/" . $image_file);

    $photo->title       = $_POST['title'];
    $photo->description = $_POST['description'];
    $photo->filename    = $_FILES['image']['name'];
    $photo->type        = $_FILES['image']['type'];
    $photo->size        = $_FILES['image']['size'];
    $photo->user_id     = $_SESSION['user_id'];

    $photo->create();
    redirect('photos.php');

  } else {
    echo $message;
  }

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
      <input type="file" name="image" class="form-control">
    </div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
  </form>
</div>
</div>
</div>
<!-- /.row -->
