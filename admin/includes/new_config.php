<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'php_oop_gallery');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connection) {
  echo 'true';
}
