<?php

class User {
  public function find_all_users() {
    global $database;
    $user_result = $database->query("SELECT * FROM users");
    return $user_result;
  }
}

$user = new User();
