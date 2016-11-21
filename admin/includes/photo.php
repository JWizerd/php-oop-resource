<?php

class Photo extends Db_object {

  public $photo_id, $title, $description, $filename, $type, $size, $user_id;
  protected static $db_table = "photos";
  protected static $db_fields = ['title', 'description', 'filename', 'type', 'size', 'user_id'];
  public $upload_errors = array(
    UPLOAD_ERR_OK          => "Successfully Uploaded.",
    UPLOAD_ERR_INI_SIZE    => "File exceeds upload_max_filesize set in php.ini",
    UPLOAD_ERR_FORM_SIZE   => "File exceeds Maximum upload size",
    UPLOAD_ERR_PARTIAL     => "File only partially uploaded.",
    UPLOAD_ERR_NO_FILE     => "No File Uploaded.",
    UPLOAD_ERR_NO_TMP_DIR  => "No Temporary Upload Folder",
    UPLOAD_ERR_CANT_WRITE  => "Failed to write to file disk",
    UPLOAD_ERR_EXTENSION   => "A PHP Extension stopped file upload",
  );
  public $temp_image;
  public $image_file;
  public $image_directory = "images";

  public function error_upload() {
    $the_error = $_FILES['image']['error'];
    return $this->upload_errors[$the_error];
  }

  public function validate_image_upload() {
    $message = $this->error_upload();
    if ($message == "Successfully Uploaded.") {
      $this->upload_image();
    } else {
      echo $message;
    }
  }

  private function upload_image() {
    $this->temp_image      = $_FILES['image']['tmp_name'];
    $this->image_file      = $_FILES['image']['name'];
    $this->image_directory = "images";
    $this->title       = $_POST['title'];
    $this->description = $_POST['description'];
    $this->filename    = $_FILES['image']['name'];
    $this->type        = $_FILES['image']['type'];
    $this->size        = $_FILES['image']['size'];
    $this->user_id     = $_SESSION['user_id'];
    $this->move_image();
    $this->create();
    redirect('photos.php');
  }

  private function move_image() {
    move_uploaded_file($this->temp_image, $this->image_directory . "/" . $this->image_file);
  }

  public static function find_photos_by_user_id($id) {
    return self::the_query("SELECT * FROM " . static::$db_table . " WHERE user_id = $id ");
  }
}

$photo = new Photo();
