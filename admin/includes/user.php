<?php

class User {

  public $username;
  public $password;
  public $first_name;
  public $last_name;
  public $user_id;

  public static function find_all_users() {
    global $database;
    $user_result = self::the_query("SELECT * FROM users");
    return $user_result;
  }

  public static function get_users_by_id($id) {
    global $database;
    $user_result = self::the_query("SELECT * FROM users WHERE user_id = $id ");
    return $user_result;
  }

  public static function the_query($sql) {
    global $database;
    $query = $database->query($sql);
    return mysqli_fetch_array($query);
  }

  public static function instantiate($new_user) {
    // creating new user object
    $user_object = new self;

    // iterate through new user array taken from DB. If user array contains a key located in class properties add value of property from assoc db array.
    foreach ($new_user as $property => $value) {
      if($user_object->has_property($property)) {
        $user_object->$property = $value;
      }
    }

    return $user_object;
  }

  private function has_property($property) {
    // grab properties from User object
    $object_properties = get_object_vars($this);
    return array_key_exists($property, $object_properties);
  }
}

$user = new User();
