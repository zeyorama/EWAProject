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
if (!preg_match("([\w\-\.]+)@((\[([0-9]{1,3}\.){3}[0-9]{1,3}\])|(([\w\-]+\.)+)([a-zA-Z]{2,4}))", $email)) {
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

$db->query("INSERT INTO _user(nick,email,pass,admin,locked,created_at) VALUES('$nick','$email','$p',0,0,current_timestamp);");

login($nick,$pass);

header("Location: index.php");

?>
