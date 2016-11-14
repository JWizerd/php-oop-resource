<?php

function class_auto_loader($class) {
  $class = strtolower($class);
  $path = "includes/{$class}";

  if(is_file($the_path) && !class_exists($class)) {
    include $path;
  }
}

spl_autoload_register('class_auto_loader');
