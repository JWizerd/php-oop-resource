<?php
if(isset($_POST["submit"])) {
  if($photo->validate_image_upload()) {
    $photo->upload_image();
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
      <input type="file" name="image" class="form-control" require>
    </div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
  </form>
</div>
</div>
</div>
<!-- /.row -->
