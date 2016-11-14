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
      if($user_object->has_property($property)) {
        $user_object->$property = $value;
      }
    }

    return $user_object;
  }

  public function has_property($property) {
    // grab properties from User object
    $object_properties = get_object_vars($this);
    return array_key_exists($property, $object_properties);
  }
}

$user = new User();
