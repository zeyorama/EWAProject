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

$gen->set_title("Test");
$gen->add_content("<div>Miau</div>");

$db->prepare("SELECT * FROM _user;");
$db->exe_prepare();

while($ar = $db->get_next_result("User")) {
	echo "{$ar->getNick()}   {$ar->getMail()}<br>";
}

$gen->print_html();

$db->close();
?>
