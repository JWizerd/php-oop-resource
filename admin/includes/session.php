<?php

class Session {

  private $signed_in = false;
  public $user_id;

  function __construct() {
    session_start();
    $this->logged_in();
  }

  public function is_signed_in() {
    return $this->$signed_in;
  }

  public function login($user) {
    if($user) {
      $this->user_id = $_SESSION['user_id'] = $user->$user_id;
      $this->signed_in = true;
    }
  }

  public function logout($user) {
    unset($_SESSION['user_id']);
    unset($this->user_id);
    $this->signed_in = false;
  }

  private function logged_in() {
    if (isset($_SESSION['user_id'])) {

      $this->user_id = $_SESSION['user_id'];
      $this->signed_in = true;

    } else {

      unset($this->user_id);
      $this->signed_in = false;

    }
  }
}

$session = new Session();
