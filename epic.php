<?php

# starting session
session_start();

date_default_timezone_set('Europe/Berlin');

# set default values for user and db
$_SESSION['user'] = NULL;
$_SESSION['db'] = NULL;

# if config.php exists, it will be included, otherwise the script stopps and prints error message
# #################################
file_exists('config.php')
  or die("config.php not found, please execute config.pl to generate config file<br />\n");
include_once 'config.php';
# #################################

?>
