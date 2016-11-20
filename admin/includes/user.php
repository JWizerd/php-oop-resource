<?php

class User extends Db_object {

  public $username, $password, $first_name, $last_name, $user_id;
  protected static $db_table = "users";
  protected static $db_fields = ['username', 'password', 'first_name', 'last_name'];

  public static function find_user_by_id($id) {
    $user = self::the_query("SELECT * FROM " . self::$db_table . " WHERE user_id = $id ");
    return array_shift($user);
  }

  public static function verify_user($username, $password) {
    global $database;
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);

    $sql  = "SELECT * FROM users WHERE ";
    $sql .= "username = '{$username}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";

    $user = self::the_query($sql);

    return !empty($user) ? array_shift($user) : false;
  }

  public static function find_user_by_session_id() {
    if(isset($_SESSION['user_id'])) {
      return self::find_user_by_id($_SESSION['user_id']);
    }
  }

  public function get_full_name() {
    return ucfirst($this->first_name) . " " . ucfirst($this->last_name);
  }

  public static function validate_username($username) {
    global $database;
    $sql = "SELECT * FROM users WHERE username = '$username' ";
    $users = $database->query($sql)->fetch_array();
    return (!empty($users)) ? true : false;
  }
  
}

$user = new User();
