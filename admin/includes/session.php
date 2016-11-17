<?php

class Session {

  private $signed_in = false;
  public $user_id;

  function __construct() {
    session_start();
    $this->logged_in();
    $this->check_message();
  }

  public function is_signed_in() {
    return $this->signed_in;
  }

  public function login($user) {
    if($user) {
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

  public function message($msg="") {
    if(!empty($msg)) {
      $_SESSION['message'] = $msg;
      return $_SESSION['message'];
    } else {
      return $this->message;
    }
  }

  private function check_message() {
    if(isset($_SESSION['message'])) {
      $this->message = $_SESSION['message'];
      unset($_SESSION['message']);
    } else {
      $this->message = "";
    }
  }
}

$session = new Session();
