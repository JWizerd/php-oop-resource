<?php

class Session {

  private $signed_in = false;
  public $user_id;

  function __construct() {
    session_start();

  }

  private function logged_in() {
    if (isset($_SESSION['user_id'])) {

      $this->user_id = $_SESSION['user_id'];
      $this->signed_in = true;

    } else {

      $this->unset($this->user_id);
      $this->signed_in = false;

    }
  }

  public function is_signed_in() {
  }
}

$session = new Session();
