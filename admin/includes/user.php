<?php

class User {

  public static function find_all_users() {
    global $database;
    $user_result = self::the_query("SELECT * FROM users");
    return $user_result;
  }

  public static function get_users_by_id($id) {
    global $database;
    $user_result = $database->query("SELECT * FROM users WHERE user_id = $id ");
  }

  public static function the_query($sql) {
    global $database;
    return $database->query($sql);
  }
}

$user = new User();
