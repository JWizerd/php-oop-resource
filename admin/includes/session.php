<?php

class Session {

  private $signed_in = false;
  public $user_id;

  function __construct() {
    session_start();
    $this->logged_in();
  }

  public function is_signed_in() {
    return $this->signed_in;
  }

  public function login($user) {
    if($user) {
      // if user is found in the database set the user_id that is set in SESSION associative array
      $this->user_id = $_SESSION['user_id'] = $user->user_id;
      $this->signed_in = true;
    }
  }

  public function logout() {
    unset($_SESSION['user_id']);
    $this->unset_properties();
  }

  private function logged_in() {
    if (isset($_SESSION['user_id'])) {

      $this->user_id = $_SESSION['user_id'];
      $this->signed_in = true;

    } else {

      $this->logout();

    }
  }

  private function unset_properties() {
    unset($this->user_id);
    $this->signed_in = false;
  }
}

$session = new Session();
