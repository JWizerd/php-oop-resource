<?php

class User {

  public $username, $password, $first_name, $last_name, $user_id;
  protected static $db_table = "users";
  protected static $db_fields = ['username', 'password', 'first_name', 'last_name'];

  public static function all() {
    return self::the_query("SELECT * FROM " . self::$db_table . " ");
  }

  public static function find_by_id($id) {
    $user = self::the_query("SELECT * FROM " . self::$db_table . " WHERE user_id = $id ");
    return array_shift($user);
  }

  public static function the_query($sql) {
    global $database;
    $query = $database->query($sql);
    $object_array = [];
    while($row = $query->fetch_array()) {
      array_push($object_array, self::instantiate($row));
    }
    return $object_array;
  }

  public static function instantiate($new_user) {
    $user_object = new self;
    foreach ($new_user as $property => $value) {
      if(property_exists($user_object, $property)) {
        $user_object->$property = $value;
      }
    }
    return $user_object;
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
      return self::find_by_id($_SESSION['user_id']);
    }
  }

  public function get_full_name() {
    return ucfirst($this->first_name) . " " . ucfirst($this->last_name);
  }

  public function get_properties() {
    global $database;
    $properties  = [];
    foreach (self::$db_fields as $field) {
      if (property_exists($this, $field)) {
        $properties[$field] = $database->escape_string($this->$field);
      }
    }
    return $properties;
  }

  public function create() {
    global $database;

    $properties = $this->get_properties();

    $sql  = "INSERT INTO " . self::$db_table . "(" . implode(array_keys($properties), ', ') . ") ";
    $sql .= "VALUES ('" . implode(array_values($properties), "','") . "') ";

    if($database->query($sql)) {
      $this->user_id = $database->insert_id();
      return true;
    } else {
      return false;
    }
  }

  public static function validate_username($username) {
    global $database;
    $sql = "SELECT * FROM users WHERE username = '$username' ";
    $users = $database->query($sql)->fetch_array();
    return (!empty($users)) ? true : false;
  }

  public function update() {
    global $database;
    $properties = $this->get_properties();
    $properties_to_sql = [];

    foreach ($properties as $key => $value) {
      $properties_to_sql[] = "{$key} = '{$value}'";
    }

    implode($properties_to_sql, ', ');

    $sql = "UPDATE " . self::$db_table . " SET ";
    $sql .= implode($properties_to_sql, ', ') . " ";
    $sql .= "WHERE user_id= '" . $database->escape_string($this->user_id) . "'";

    $database->query($sql);

    return ($database->connection->affected_rows == 1) ? true : false;
  }

  public function delete() {
    global $database;
    global $session;
    $session->logout();

    $sql = "DELETE FROM " . self::$db_table . " WHERE user_id=" . $database->escape_string($this->user_id);
    $database->query($sql);

    redirect("login.php");
    return ($database->connection->affected_rows == 1) ? true : false;
  }
}

$user = new User();
