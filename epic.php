<?php

session_start();

$_SESSION['user'] = NULL;
$_SESSION['db'] = NULL;
if (file_exists('config.php')) {
  include_once 'config.php';
} else {
  echo "config.php not found, please execute config.pl to generate config file<br />\n";
  exit;
}

?>
