<?php

class User {

  public $username;
  public $password;
  public $first_name;
  public $last_name;
  public $user_id;

  public static function all() {
    return self::the_query("SELECT * FROM users ");
  }

  public static function find_by_id($id) {
    $user = self::the_query("SELECT * FROM users WHERE user_id = $id ");
    return array_shift($user);

  }

  // OBJECT RELATIONAL MAPPING
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
    // creating new user object
    $user_object = new self;

    // iterate through new user array taken from DB. If user array contains a key located in class properties add value of property from assoc db array.
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

  public function create() {
    global $database;
    $sql  = "INSERT INTO users (username, password, first_name, last_name) ";
    $sql .= "VALUES ('";
    $sql .= $database->escape_string($this->username) . "', '";
    $sql .= $database->escape_string($this->password) . "', '";
    $sql .= $database->escape_string($this->first_name) . "', '";
    $sql .= $database->escape_string($this->last_name) . "')";

    if ($database->query($sql)) {
      $this->user_id = $database->insert_id();
      return true;
    } else {
      return false;
    }

  }

  public function update() {
    global $database;
    $sql = "UPDATE users SET ";
    $sql .= "username= '" . $database->escape_string($this->username) . "', ";
    $sql .= "password= '" . $database->escape_string($this->password) . "', ";
    $sql .= "first_name= '" . $database->escape_string($this->first_name) . "', ";
    $sql .= "last_name= '" . $database->escape_string($this->last_name) . "' ";
    $sql .= "WHERE user_id= '" . $database->escape_string($this->user_id) . "'";

    $database->query($sql);

    return ($database->connection->affected_rows == 1) ? true : false;
  }

  public function delete() {
    global $database;
    global $session;
    $session->logout();
    $sql = "DELETE FROM users WHERE user_id=" . $database->escape_string($this->user_id);
    $database->query($sql);
    redirect("login.php");
  }
}

$user = new User();
