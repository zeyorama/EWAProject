<?php

include 'epic.php';
global $db;

$nick = $_POST['nick'];
$email = $_POST['email'];
$pass = $_POST['pass'];

if (strlen($nick) < 5) {
  $_SESSION['err'] = 'nickname at least 5 characters';
  header('Location: index.php?register&err');
}
if (strlen($email) < 5) {
  $_SESSION['err'] = 'email formate incorrect';
  header('Location: index.php?register&err');
}
if (strlen($pass) < 5) {
  $_SESSION['err'] = 'password at least 5 characters';
  header('Location: index.php?register&err');
}

$p = md5($pass);

$db->query("INSERT INTO _user(nick,email,pass,admin,locked,created_at) VALUES('$nick','$email','$p',0,0,current_timestamp);");

login($nick,$pass);

header("Location: index.php");

?>
