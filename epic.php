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

//login("Quallenmann", "EWAProjectPass");

$db->query("SELECT * FROM _user");
echo "<br>";
var_dump($db->get_next_result("User"));

$gen->set_title("Test");
$gen->add_content("<div>Miau</div>");

$db->prepare("SELECT * FROM _user WHERE nick = ? OR nick = ?;");
$db->exe_prepare("ss", "Quallenmann", "zeyorama");

while($ar = $db->get_next_result("User")) {
	echo "<br>{$ar->getNick()}   {$ar->getMail()}";
}

$gen->print_html();

$db->close();
?>
