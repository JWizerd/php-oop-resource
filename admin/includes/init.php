<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"] . DS . "php-oop-resource");
define('IMAGE_DIR', SITE_ROOT . DS . "admin" . DS . "images");
require_once('functions.php');
require_once('new_config.php');
require_once('database.php');
require_once('db_object.php');
require_once('user.php');
require_once('session.php');
require_once('photo.php');
require_once('comment.php');
