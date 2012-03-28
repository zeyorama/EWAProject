<?php

include 'epic.php';
global $db;

$nick = $_POST['nick'];
$email = $_POST['email'];
$pass = $_POST['pass'];

if (strlen($nick) < 5) {
  $_SESSION['err'] = 'nickname at least 5 characters';
  header('Location: index.php?register');
  die;
}
if (!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $email)) {
  $_SESSION['err'] = 'email formate incorrect';
  header('Location: index.php?register');
  die;
}
if (strlen($pass) < 5) {
  $_SESSION['err'] = 'password at least 5 characters';
  header('Location: index.php?register');
  die;
}

$db->query("SELECT * FROM _user WHERE nick='$nick';");

if ($db->get_length() > 0) {
  $_SESSION['err'] = "$nick allready in use, try another one";
  header('Location: index.php?register');
  die;
}

$db->query("SELECT * FROM _user WHERE email='$email';");

if ($db->get_length() > 0) {
  $_SESSION['err'] = "$email allready in use, choose another one";
  header('Location: index.php?register');
  die;
}

$p = md5($pass);

$db->query("INSERT INTO _user(nick,email,pass,admin,locked,created_at) VALUES('$nick','$email','$p',0,1,current_timestamp);");


$_SESSION['register'] = 'You are now registered. Please wait for unlocking your account by an admin.';
header("Location: index.php");

?>
