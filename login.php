<?php

include 'epic.php';

# store login return value
$login = login($_POST['nick'], $_POST['pass']);

# controll if login failed or not
if (!$login) {
  $_SESSION['err'] = 'username or password incorrect, please try again!';
  header('Location: index.php');
}

if ($login == -3) {
  $_SESSION['err'] = 'you are currently locked, please wait for unlock or contact an admin!';
  header('Location: index.php');
}

if (unserialize($_SESSION['user'])->isLocked()) {
  logout();
}

header("Location: index.php"); # redirects to main page

?>
