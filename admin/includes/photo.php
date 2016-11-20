<?php

class Photo extends Db_object {

  public $photo_id, $title, $description, $filename, $type, $size, $user_id;
  protected static $db_table = "photos";
  protected static $db_fields = ['title', 'description', 'filename', 'type', 'size', 'user_id'];

  public function error_upload() {
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
    return $upload_errors[$the_error];
  }
}

$photo = new Photo();
