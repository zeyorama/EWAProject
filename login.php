<?php

include 'epic.php';

# controll if login failed or not
if (!login($_POST['nick'], $_POST['pass'])) {
  $_SESSION['err'] = 'Login failed, try again!';
}

header("Location: index.php");

?>
