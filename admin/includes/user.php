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
    return self::the_query("SELECT * FROM users WHERE user_id = $id ");
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
}

$user = new User();
