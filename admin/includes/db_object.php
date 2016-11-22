<?php

class Db_object {

  protected static $db_table = "";
  protected static $db_fields = [];
  protected $id_type = "";

  public static function all() {
    return self::the_query("SELECT * FROM " . static::$db_table . " ");
  }

  public static function find_by_id($id) {
    $user = self::the_query("SELECT * FROM " . static::$db_table . " WHERE user_id = $id ");
    return array_shift($user);
  }

  public static function the_query($sql) {
    global $database;
    $query = $database->query($sql);
    $object_array = [];
    while($row = $query->fetch_array()) {
      array_push($object_array, static::instantiate($row));
    }
    return $object_array;
  }

  public static function instantiate($new_user) {
    $class = get_called_class();
    $user_object = new $class;
    foreach ($new_user as $property => $value) {
      if(property_exists($user_object, $property)) {
        $user_object->$property = $value;
      }
    }
    return $user_object;
  }

  public function get_properties() {
    global $database;
    $properties  = [];
    foreach (static::$db_fields as $field) {
      if (property_exists($this, $field)) {
        $properties[$field] = $database->escape_string($this->$field);
      }
    }
    return $properties;
  }

  public function create() {
    global $database;

    $properties = $this->get_properties();

    $sql  = "INSERT INTO " . static::$db_table . "(" . implode(array_keys($properties), ', ') . ") ";
    $sql .= "VALUES ('" . implode(array_values($properties), "','") . "') ";

    if($database->query($sql)) {
      $this->user_id = $database->insert_id();
      return true;
    } else {
      return false;
    }
  }

  public function update() {
    global $database;
    $properties = $this->get_properties();
    $properties_to_sql = [];

    foreach ($properties as $key => $value) {
      $properties_to_sql[] = "{$key} = '{$value}'";
    }

    implode($properties_to_sql, ', ');

    $sql = "UPDATE " . static::$db_table . " SET ";
    $sql .= implode($properties_to_sql, ', ') . " ";
    $sql .= "WHERE user_id= '" . $database->escape_string($this->user_id) . "'";

    $database->query($sql);

    return ($database->connection->affected_rows == 1) ? true : false;
  }

  public function delete($id_type) {
    global $database;

    $sql = "DELETE FROM " . static::$db_table . " WHERE {$id_type}=" . $database->escape_string($this->user_id);
    $database->query($sql);

    return ($database->connection->affected_rows == 1) ? true : false;
  }

}
