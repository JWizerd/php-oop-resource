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

  public function image_path() {
    return $this->image_directory.DS.$this->filename;
  }

  public function error_upload() {
    $the_error = $_FILES['image']['error'];
    return $this->upload_errors[$the_error];
  }

  public function validate_image_upload() {
    $file = $_FILES['image']['name'];
    $target_path = IMAGE_DIR . DS . $file;
    $message = $this->error_upload();

    if (file_exists($target_path)) {
      echo "This file already exists. <strong>" . $file . "</strong>";
    } elseif ($message == "Successfully Uploaded.") {
      echo $message;
      return true;
    } else {
      echo $message;
      return false;
    }
  }

  private function set_image_properties() {
    $this->temp_image      = $_FILES['image']['tmp_name'];
    $this->image_directory = "images";
    $this->title           = $_POST['title'];
    $this->description     = $_POST['description'];
    $this->filename        = basename($_FILES['image']['name']);
    $this->type            = $_FILES['image']['type'];
    $this->size            = $_FILES['image']['size'];
    $this->user_id         = $_SESSION['user_id'];
  }

  public function upload_image() {
    $this->set_image_properties();
    $this->move_image();
    $this->create();
    redirect('photos.php');
  }

  public function update_image($id_type) {
    $this->remove_photo_from_dir();
    $this->set_image_properties();
    $this->move_image();
    $this->update($id_type);
    redirect('photos.php');
  }

  private function move_image() {
    move_uploaded_file($this->temp_image, $this->image_directory . "/" . $this->filename);
  }

  public static function find_photos_by_user_id($id) {
    return self::the_query("SELECT * FROM " . static::$db_table . " WHERE user_id = $id ");
  }

  public function delete_photo($photo_id) {
    global $database;
    $sql = "DELETE FROM " . self::$db_table . " WHERE photo_id=" . $database->escape_string($photo_id);
    $database->query($sql);
    $this->remove_photo_from_dir();
    return ($database->connection->affected_rows == 1) ? true : false;
  }

  private function remove_photo_from_dir() {
    unlink(IMAGE_DIR . DS . $this->filename);
  }
}

$photo = new Photo();
